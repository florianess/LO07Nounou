<?php
session_start();

if (isset($_SESSION['user'])) {
  switch ($_SESSION['user']['type_user']) {
    case 'admin':
      header('Location: accueil\admin.php');
      break;
    case 'nounou':
      header('Location: accueil\nounou.php');
      break;
    case 'parent':
      header('Location: accueil\parent.php');
      break;
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Accueil</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
</head>
<body>
  <div class="navbar-fixed">
    <nav class="white" role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="" class="brand-logo grey-text text-darken-1"> NounouFinder</a>
        <ul class="right hide-on-med-and-down">
          <li><button data-target="login" class="btn modal-trigger pink lighten-1">Connexion</button></li>
        </ul>
      </div>
    </nav>
  </div>
  <div id="await" class="modal">
    <div class="modal-content center">
      <h4>Inscription en Attente</h4>
      <p>Votre inscription est en cours de validation.</p>
      <a class="modal-close waves-effect waves-green btn">OK</a>
    </div>
  </div>
  <div id="error" class="modal">
    <div class="modal-content center">
      <h4 class="red-text">ERREUR</h4>
      <p>Email incorrect</p>
      <a class="modal-close waves-effect waves-green btn">OK</a>
    </div>
  </div>
  <div id="errorpw" class="modal">
    <div class="modal-content center">
      <h4 class="red-text">ERREUR</h4>
      <p>Mot de passe incorrect</p>
      <a class="modal-close waves-effect waves-green btn">OK</a>
    </div>
  </div>
  <div id="create" class="modal">
    <div class="modal-content center">
      <h4>Compte créé</h4>
      <p>Votre compte a été créé et est en attente de validation</p>
      <a class="modal-close waves-effect waves-green btn">OK</a>
    </div>
  </div>
  <div id="login" class="modal">
    <div class="modal-content">
      <h4>Connexion</h4>
      <form class="" action="db/auth.php" method="post">
        <input id="email" type="text" name="email">
        <label for="email">Identifiant</label>
        <input id="password" type="password" name="password">
        <label for="password">Mot de passe</label>
        <br>
        <br>
        <button class="btn waves-effect waves-light pink lighten-1" type="submit">Se connecter</button>
      </form>
    </div>
  </div>
  <div class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br/><br/>
        <h1 class="right-align" id="nounoufinder">NounouFinder</h1>
        <h5 class="darkblue-text right-align">Le site web idéal pour parents et nounous</h5>
        <br>
        <button data-target="signin" class="btn-large modal-trigger pink right" id="btnInscription">S'inscrire</button>
      </div>
    </div>
    <div class="parallax"><img src="img/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>

  <div id="signin" class="modal">
    <div class="modal-content center">
      <h4>Inscription</h4>
      <br/>
      <br/>
      <div class="row">
        <div class="col s12 m6">
          <a href="forms/NounouForm.php" class="btn-large waves-effect waves-light teal lighten-1"><b>Je suis nounou </b></a>
        </div>
        <div class="col s12 m6">
          <a href="forms/ParentsForm.html" class="btn-large waves-effect waves-light teal lighten-1"><b>Je suis parent </b></a>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Inscription éclair</h5>

            <p class="light">Aussitôt inscrit pas besoin d'attendre 2 semaines pour commander une nounou.</p>
          </div>
        </div>

        <div class="col s12 m6">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Du social avant tout</h5>

            <p class="light">Le moyen de rencontrer des nounous et parents mais pas que!</p>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <br/><br/><br/>
          <h3 class="header col s12 light black-text" id="blablacar">Le Blablacar des nounous</h3>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="img/img1.jpg" alt="Unsplashed background img 2"></div>
  </div>
  <footer class="whpage-footer">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="black-text">Contactez nous</h5>
        <p class="grey-text text-darken-1">contact@NounouFinder.com</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="black-text">Services</h5>
        <ul>
          <li><a class="grey-text text-darken-1" href="forms/NounouForm.php">Inscription en tant que Nounou</a></li>
          <li><a class="grey-text text-darken-1" href="forms/ParentsForm.html">Inscription en tant que Parent</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class=" grey lighten-3 footer-copyright">
  <div class="container">
  © 2018 Copyright nounoufinder.com
  <a class="grey-text text-darken-1 right" href="../index.php">Accueil</a>
</div>
</div>
</footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="js/init.js"></script>
</body>
</html>
