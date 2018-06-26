<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>Administration</title>
</head>
<body class="administration">

<?php

//Permet de vérifier si l'utilisateur est autorisé à accéder à la page
session_start();
ob_start();

if (isset($_SESSION['user']) && $_SESSION['user']['type_user'] == 'admin') {

?>
<nav class="white nav-extended">
  <div class="container nav-wrapper">
    <a id="logo-container" href="../" class="brand-logo  grey-text text-darken-1">NounouFinder</a>
    <a class="brand-logo center  grey-text text-darken-1">Listes</a>
    <ul class="right">
      <li>  <a href="../db/deconnexion.php" class="btn waves-effect waves-light pink lighten-1">Déconnexion</a></li>
    </ul>
  </div>
  <div class="container nav-content">
    <ul id="tabs" class="tabs tabs-transparent">
      <li class="tab"><a class="grey-text text-darken-1" href="#candidats">Candidats</a></li>
      <li class="tab"><a class="grey-text text-darken-1 active" href="#nounous">Nounous</a></li>
      <li class="tab"><a class="grey-text text-darken-1" href="#bloques">Bloquées</a></li>
      <li class="tab"><a class="grey-text text-darken-1" href="#revenu">Revenu Nounou décroissant </a></li>
    </ul>
  </div>
</nav>
<div class="container">

  <?php
    //Affiche le module correspondant à chaque div
    echo '<div id="candidats">';
    require_once '../modules/candidats.php';
    echo '</div><div id="nounous">';
    require_once '../modules/listeNounou.php';
    echo '</div><div id="bloques">';
    require_once '../modules/bloque.php';
    echo "</div><div id=revenu>";
    require_once '../modules/ListeNounouRevenu.php';
    echo "</div>";

  } else {
    echo "<h1 class='red-text'>Accees refusé</h1>";
  }
  ob_end_flush();
  ?>
</div>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="black-text">Contactez nous</h5>
        <p class="grey-text text-darken-1">contact@NounouFinder.com</p>


      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="black-text">Services</h5>
        <ul>
          <li><a class="grey-text text-darken-1" href="../forms/NounouForm.html">Inscription en tant que Nounou</a></li>
          <li><a class="grey-text text-darken-1" href="../forms/ParentsForm.html">Inscription en tant que Parent</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class=" grey lighten-3 footer-copyright">
    <div class="container">
    © 2018 Copyright NounouFinder.com
    <a class="grey-text text-darken-1 right" href="../index.php">Accueil</a>
    </div>
  </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script src="../js/initListes.js"></script>
</body>
</html>
