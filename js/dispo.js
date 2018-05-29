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

document.addEventListener('DOMContentLoaded', function() {
  M.AutoInit();
  var date = document.querySelectorAll('.datepicker');
  var dateI = M.Datepicker.init(date, {format: 'dddd dd mmmm yyyy',i18n: frDate});
  var heure = document.querySelectorAll('.timepicker');
  var heureI = M.Timepicker.init(heure, {twelveHour: false});
});
