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

const timepickerOptions = {
  twelveHour: false,
  defaultTime: '12:00',
  onSelect: function() {this.done()}
}

const texthoraire = `
  <div class="input-field col s4">
    <label>Date :</label>
    <input type="text" class="datepicker" name="jours[]">
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
    <input name="type" type="radio" value="same" onchange="fix()"/>
    <span>Horaire fixe</span>
  </label>
  <br><br>
  <label>
    <input name="type" type="radio" value="diff" onchange="flex()"/>
    <span>Horaires par journée</span>
  </label>
  <br><br><hr><br>`;

const textponct = `<select id="ponct" multiple name="jours[]">
  <option value="" disabled selected>Choix des jours</option>
  <option value="1">Lundi</option>
  <option value="2">Mardi</option>
  <option value="3">Mercredi</option>
  <option value="4">Jeudi</option>
  <option value="5">Vendredi</option>
  <option value="6">Samedi</option>
  <option value="0">Dimanche</option>
</select>
<label>Journées</label><hr><br>`+textregu;

const send = `<button class="btn-large waves-effect waves-light" type="submit">Envoyer
  <i class="material-icons right">send</i>
</button><br><br>`;

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

function displayJours(jours) {
  let text = '';
  jours.forEach((jour) => {
    text += `
    <div class="row">
      <div class="input-field col s2">
        <p class="right"> ${jour} </p>
      </div>
      <div class="input-field col s5">
        <label>De :</label>
        <input type="text" class="timepicker" name="debut[]">
      </div>
      <div class="input-field col s5">
        <label>A :</label>
        <input type="text" class="timepicker" name="fin[]">
      </div>
    </div>`;
  })
  text += send;
  return text;
}

let step1;
let step2;

function add() {
  var htmlObject = document.createElement('div');
  htmlObject.className = 'row';
  htmlObject.innerHTML = texthoraire;
  const btn = document.getElementById("add");
  document.getElementById('test').insertBefore(htmlObject, btn);
  var date = document.querySelectorAll('.datepicker');
  M.Datepicker.init(date, {format: 'dddd dd mmmm yyyy',i18n: frDate});
  var heure = document.querySelectorAll('.timepicker');
  M.Timepicker.init(heure, timepickerOptions);
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
  var date = document.querySelectorAll('.datepicker');
  M.Datepicker.init(date, {format: 'dd/mm/yyyy',i18n: frDate});
  var heure = document.querySelectorAll('.timepicker');
  M.Timepicker.init(heure, timepickerOptions);
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
  M.Timepicker.init(heure, timepickerOptions);
}

function flex() {
  if (step2) {
    step2.remove();
  }
  var htmlObject = document.createElement('div');
  let s = [];
  const listeJours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
  if (document.getElementById('work').checked) {
    jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi'];
  } else if (document.getElementById('all').checked) {
    jours = listeJours;
  } else {
    let selectHtml = document.getElementById('ponct');
    let valJours = Array.from(selectHtml.querySelectorAll("option:checked"),e=>e.value);
    jours = valJours.map(val => listeJours[parseInt(val)-1]);
  }
  htmlObject.innerHTML = displayJours(jours);
  document.getElementById("form").appendChild(htmlObject);
  step2 = htmlObject;
  M.AutoInit();
  var heure = document.querySelectorAll('.timepicker');
  M.Timepicker.init(heure, timepickerOptions);
}

document.addEventListener('DOMContentLoaded', function() {
  M.AutoInit();
  var request = window.location.search.match(/[a-z]+/g);
  if (request && request[0] === 'error') {
    M.Modal.getInstance(document.getElementById('error')).open();
  }
});
