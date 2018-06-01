$(function() {
  $('#calendar').fullCalendar({
    locale: 'fr',
    defaultView: 'agendaWeek',
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'agendaWeek,agendaDay'
    },
    allDaySlot: false
  })

});
