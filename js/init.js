document.addEventListener('DOMContentLoaded', function() {
    var para = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(para);
    var modal = document.querySelectorAll('.modal');
    var instances2 = M.Modal.init(modal);
  });
