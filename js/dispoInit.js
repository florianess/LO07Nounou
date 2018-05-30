const frDate = {
      cancel: 'Annuler',
      clear: 'Vider',
      done: 'Ok',
      previousMonth: '‹',
      nextMonth: '›',
      months: [
        'Janvier',
        'Fevrier',
        'Mars',
        'Avril',
        'Mai',
        'Juin',
        'Juillet',
        'Août',
        'Septembre',
        'Octobre',
        'Novembre',
        'Decembre'
      ],
      monthsShort: [
        'Jan',
        'Fev',
        'Mar',
        'Apr',
        'Mai',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
      ],
      weekdays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
      weekdaysShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
      weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
    }

const texthoraire = `
  <div class="input-field col s4">
    <label>Date :</label>
    <input type="text" class="datepicker" name="date[]">
  </div>
  <div class="input-field col s4">
    <label>De :</label>
    <input type="text" class="timepicker" name="debut[]">
  </div>
  <div class="input-field col s4">
    <label>A :</label>
    <input type="text" class="timepicker" name="fin[]">
  </div>`;

const textregu = `
  <label>
    <input name="day" type="radio" value="same" onchange="fix()"/>
    <span>Horaire fixe</span>
  </label>
  <br><br>
  <label>
    <input name="day" type="radio" value="diff"/>
    <span>Horaires par journée</span>
  </label>
  <br><br><hr><br>`;

const textponct = `<select multiple name="jours[]">
  <option value="" disabled selected>Choix des jours</option>
  <option value="1">Lundi</option>
  <option value="2">Mardi</option>
  <option value="3">Mercredi</option>
  <option value="4">Jeudi</option>
  <option value="5">Vendredi</option>
  <option value="6">Samedi</option>
  <option value="7">Dimanche</option>
</select>
<label>Journées</label><hr><br>`+textregu;

const send = `<button class="btn-large waves-effect waves-light" type="submit">Envoyer
  <i class="material-icons right">send</i>
</button>`;

const textsome = texthoraire + `<br><br>
<a id="add" class="btn-floating btn-large waves-effect waves-light" onclick="add()"><i class="material-icons">add</i></a>
<br><br>`+ send;

const heures = `<div class="input-field col s6">
  <label>De :</label>
  <input type="text" class="timepicker" name="debut[]">
</div>
<div class="input-field col s6">
  <label>A :</label>
  <input type="text" class="timepicker" name="fin[]">
</div>` + send;

let step1;
let step2;

function add() {
  var htmlObject = document.createElement('div');
  htmlObject.className = 'row';
  htmlObject.innerHTML = texthoraire;
  const btn = document.getElementById("add");
  document.getElementById('test').insertBefore(htmlObject, btn);
  M.AutoInit();
  var date = document.querySelectorAll('.datepicker');
  var dateI = M.Datepicker.init(date, {format: 'dddd dd mmmm yyyy',i18n: frDate});
  var heure = document.querySelectorAll('.timepicker');
  var heureI = M.Timepicker.init(heure, {twelveHour: false});
}

function regu() {
  if (step1) {
    step1.remove();
  }
  if (step2) {
    step2.remove();
  }
  var htmlObject = document.createElement('div');
  htmlObject.innerHTML = textregu;
  document.getElementById("form").appendChild(htmlObject);
  step1 = htmlObject;
  M.AutoInit();
}

function ponct() {
  if (step1) {
    step1.remove();
  }
  if (step2) {
    step2.remove();
  }
  var htmlObject = document.createElement('div');
  htmlObject.innerHTML = textponct;
  document.getElementById("form").appendChild(htmlObject);
  step1 = htmlObject;
  M.AutoInit();
}

function some() {
  if (step1) {
    step1.remove();
  }
  if (step2) {
    step2.remove();
  }
  var htmlObject = document.createElement('div');
  htmlObject.innerHTML = textsome;
  htmlObject.className = 'row';
  htmlObject.id = 'test';
  document.getElementById("form").appendChild(htmlObject);
  step1 = htmlObject;
  M.AutoInit();
  var date = document.querySelectorAll('.datepicker');
  var dateI = M.Datepicker.init(date, {format: 'dddd dd mmmm yyyy',i18n: frDate});
  var heure = document.querySelectorAll('.timepicker');
  var heureI = M.Timepicker.init(heure, {twelveHour: false});
}

function fix() {
  if (step2) {
    step2.remove();
  }
  var htmlObject = document.createElement('div');
  htmlObject.innerHTML = heures;
  htmlObject.className = 'row';
  document.getElementById("form").appendChild(htmlObject);
  step2 = htmlObject;
  M.AutoInit();
  var heure = document.querySelectorAll('.timepicker');
  var heureI = M.Timepicker.init(heure, {twelveHour: false});
}

document.addEventListener('DOMContentLoaded', function() {
  M.AutoInit();
  var date = document.querySelectorAll('.datepicker');
  var dateI = M.Datepicker.init(date, {format: 'dddd dd mmmm yyyy',i18n: frDate});
  var heure = document.querySelectorAll('.timepicker');
  var heureI = M.Timepicker.init(heure, {twelveHour: false});
});
