document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.select');
  var instances = M.FormSelect.init(elems);
  var modal = document.querySelectorAll('.modal');
  var instances2 = M.Modal.init(modal);
  var request = window.location.search.match(/[a-z]+/g);
  if (request && request[0] === 'error') {
    M.Modal.getInstance(document.getElementById('error')).open();
  }
});


$('#infos').val('New Text');
M.textareaAutoResize($('#infos'));
$('#presentation').val('New Text');
M.textareaAutoResize($('#presentation'));
$('#Infos générales').val('New Text');
M.textareaAutoResize($('#Infos générales'));
