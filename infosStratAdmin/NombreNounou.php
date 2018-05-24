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
<body id="admin">
  <div class="container">
    <h1> Administration de Nounou Finder </h1>
<br/><hr/><br/>
<h3 class="catStat"> Statistiques : Le nombre de Nounous </h3>

<?php
require_once '../db/newNounous.php';
require_once '../db/nounouInscrite.php';

session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['type_user'] != 'admin') {
  echo "<h1 class='red-text'>Accees refusé</h1>";
} else {echo'<i>';
  echo'<br/>';
  echo'<br/>';

  echo'<ul>';
  echo'<li>';
  echo  ("<h4>$nounous->num_rows nouveau(x) candidat(s) 'Nounou' à valider</h4>");
  echo'</li>';
  echo'<br/>';

  echo'<li>';
  echo  ("<h4>$nounousInscrites->num_rows nounou(s) inscrit(e)(s)</h4>");
  echo'</li>';
  echo'</ul>';
  echo'</i>';

}
?>
</body>
</html>
