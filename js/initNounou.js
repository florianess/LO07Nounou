$(function() {
  $('#calendar').fullCalendar({
    locale: 'fr',
    defaultView: 'agendaWeek',
    height: 'auto',
    slotLabelFormat: 'hh:mm',
    nowIndicator: true,
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
    themeSystem: 'bootstrap4',
    eventRender: function(event, element) {
            element.find('.fc-title').append("<br/>" + event.info +"<br/>" + event.email +"<br/>" + event.portable); 
        }
  })
});

document.addEventListener('DOMContentLoaded', function() {
  M.AutoInit();
});
