document.addEventListener('DOMContentLoaded', function() {
    var para = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(para);
    var modalConnexion = document.getElementById(login);
    var instances2 = M.Modal.init(modalConnexion);
    var modalSignin = document.getElementById(signin);
    var instances3 = M.Modal.init(modalSignin);    
  });
