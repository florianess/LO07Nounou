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
  autoClose: true
}

document.addEventListener('DOMContentLoaded', function() {
  M.AutoInit();
  var date = document.querySelectorAll('.datepicker');
  M.Datepicker.init(date, {format: 'dd/mm/yyyy',i18n: frDate, autoClose: true});
  var heure = document.querySelectorAll('.timepicker');
  M.Timepicker.init(heure, timepickerOptions);
  var request = window.location.search.match(/[a-z]+/g);
  if (request && request[0] === 'res') {
    M.Modal.getInstance(document.getElementById('res')).open();
  }
});
