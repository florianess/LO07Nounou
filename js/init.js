document.addEventListener('DOMContentLoaded', function() {
  M.AutoInit();
  var request = window.location.search.match(/[a-z]+/g);
  if (request && request[0] === 'status') {
    switch (request[1]) {
      case 'await':
        M.Modal.getInstance(document.getElementById('await')).open();
        break;
      case 'error':
        M.Modal.getInstance(document.getElementById('error')).open();
        break;
      case 'create':
        M.Modal.getInstance(document.getElementById('create')).open();
        break;
      case 'errorpw':
        M.Modal.getInstance(document.getElementById('errorpw')).open();
        break;
    }
  }
});
