document.addEventListener('DOMContentLoaded', function() {
    var para = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(para);
    var modal = document.querySelectorAll('.modal');
    var instances2 = M.Modal.init(modal);
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
      }
    }
  });
