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
  <nav class="white nav-extended">
    <div class="container nav-wrapper">
      <a id="logo-container" href="../" class="brand-logo  grey-text text-darken-1">NounouFinder</a>
      <a class="brand-logo center  grey-text text-darken-1">Statistiques</a>
      <ul class="right hide-on-med-and-down">
        <li>  <a href="../db/deconnexion.php" class="btn waves-effect waves-light pink lighten-1">Déconnexion</a></li>
      </ul>
    </div>
    <div class="container nav-content">
      <ul id="tabs" class="tabs tabs-transparent">
        <li class="tab"><a class="grey-text text-darken-1 active" href="#nbInscrits">Nombre d'inscrits</a></li>
        <li class="tab"><a class="grey-text text-darken-1 " href="#CA">Chiffre d'affaire</a></li>
      </ul>
    </div>
  </nav>

<div class="container">

  <?php
  require_once '../db/newNounous.php';
  require_once '../db/nounouInscrite.php';
  require_once '../db/parentInscrit.php';
  require_once '../db/enfantInscrit.php';




  session_start();

  if (isset($_SESSION['user']) && $_SESSION['user']['type_user'] == 'admin') {
  echo("<div id='nbInscrits'>");
    echo'<br/>';


    echo("<h4 class ='nombreInscrits' ><b>Le nombre de Nounous :</b></h4>");
    $nbNounousTotale =$nounousInscrites->num_rows + $nounousBloquées->num_rows;
    echo '<ul>';
    echo '<li>';
    echo "<h5><b>$nounous->num_rows</b> Nouveau(x) candidat(s) 'Nounou' à valider</h5>";
    echo '</li>';
    echo '<li>';
    echo "<h5><b> $nbNounousTotale </b> Nounou(s) inscrit(e)(s) au total dont :</h5>";
    echo '</li>';
    echo '<li>';
    echo "<h6><i>- <b> $nounousBloquées->num_rows</b> Nounou(s) bloquées</i></h6>";
    echo '</li>';
    echo '<li>';
    echo "<h6>    <i>- <b> $nounousInscrites->num_rows</b> Nounou(s) en activité</i></h6>";
    echo '</li>';
    echo '</ul>';
    echo '<br/>';
    echo "<h4 class ='nombreInscrits'><b>Le nombre de Familles :</b></h4>";
    echo '<ul>';
    echo '<li>';
    echo "<h5><b>$parentsInscrits->num_rows</b> Parent(s) inscrit(s)</h5>";
    echo '</li>';
    echo '<li>';
    echo "<h5><b>$enfantsInscrits->num_rows</b> Enfant(s) incrit(s) </h5>";
    echo '</li>';
    echo '</ul>';
    echo '<br/>';
    echo "</div>";


    echo "<div id='CA'";
    echo '<br/>';

  ?>

  <div class="container nav-content">
    <ul id="tabs" class="tabs tabs-transparent">
        <li class="tab"><a class="grey-text text-darken-1  " href="#annee">Année</a></li>
        <li class="tab"><a class="grey-text text-darken-1 " href="#trimestre">Trimestre</a></li>
        <li class="tab"><a class="grey-text text-darken-1" href="#mois">Mois</a></li>

    </ul>
  </div>

  <div class="container">
  <?php
    echo '<div id="mois">';
    require_once '../modules/CAParMois.php';
    echo '</div><div id="trimestre">';
  require_once '../modules/CAParTrimestre.php';
    echo '</div><div id="annee">';
    require_once '../modules/CAParAn.php';
    echo "</div>";

  } else {
    echo "<h1 class='red-text'>Accees refusé</h1>";
  }
  ob_end_flush();
  ?>
</div></div>
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
          <li><a class="grey-text text-darken-1" href="../forms/NounouForm.php">Inscription en tant que Nounou</a></li>
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
