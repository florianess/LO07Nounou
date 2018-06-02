$(function() {
  $('#calendar').fullCalendar({
    locale: 'fr',
    defaultView: 'agendaWeek',
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'agendaWeek,agendaDay'
    },
    events: {
        url: '../db/dispoNounou.php',
        type: 'POST', // Send post data
        error: function() {
            alert('There was an error while fetching events.');
        }
    },
    allDaySlot: false,
    themeSystem: 'bootstrap4'
  })
});
