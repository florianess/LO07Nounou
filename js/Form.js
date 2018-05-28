document.addEventListener('DOMContentLoaded', function() {
  M.AutoInit();
  var request = window.location.search.match(/[a-z]+/g);
  var elem = document.querySelectorAll("textarea");
  var instances = M.CharacterCounter.init(elem);
  if (request && request[0] === 'error') {
    M.Modal.getInstance(document.getElementById('error')).open();
  }
});
