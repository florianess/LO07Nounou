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

session_start();

if (isset($_SESSION['user']) && $_SESSION['user']['type_user'] == 'admin') {

?>
<nav class="white nav-extended">
  <div class="container nav-wrapper">
    <a id="logo-container" href="../accueil/admin.php" class="brand-logo  grey-text text-darken-1">NounouFinder</a>
    <a class="brand-logo center  grey-text text-darken-1">Listes</a>
  </div>
  <div class="container nav-content">
    <ul class="tabs tabs-transparent">
      <li class="tab"><a class="grey-text text-darken-1" href="#candidats">Candidats</a></li>
      <li class="tab"><a class="active grey-text text-darken-1" href="#nounous">Nounous</a></li>
      <li class="tab"><a class="grey-text text-darken-1" href="#bloques">Bloquées</a></li>
    </ul>
  </div>
</nav>
<div class="container">

<?php
  echo '<div id="candidats">';
  require_once '../modules/candidats.php';
  echo '</div><div id="nounous">';
  require_once '../modules/listeNounou.php';
  echo '</div><div id="bloques">';
  require_once '../modules/bloque.php';
  echo "</div>";
} else {
  echo "<h1 class='red-text'>Accees refusé</h1>";
}
?>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script src="../js/autoInit.js"></script>
</body>
</html>
