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

<?php
require_once '../db/newNounous.php';
require_once '../db/nounouInscrite.php';
require_once '../db/parentInscrit.php';
require_once '../db/enfantInscrit.php';
require_once '../db/garde.php';


session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['type_user'] != 'admin') {
  echo "<h1 class='red-text'>Accees refusé</h1>";
} else {
  echo"<h2 class='catStat'> Statistiques : Le nombre d'inscrits </h2>";

echo("<h3>Le nombre de Nounous </h3>");
echo'<i>';
  echo'<ul>';
  echo'<li>';
  echo  ("<h4>$nounous->num_rows nouveau(x) candidat(s) 'Nounou' à valider</h4>");
  echo'</li>';
  echo'<li>';
  echo  ("<h4>$nounousInscrites->num_rows nounou(s) inscrit(e)(s)</h4>");
  echo'</li>';
  echo'</ul>';
  echo'</i>';
  echo'<br/>';

  echo("<h3>Le nombre de Familles </h3>");
  echo'<i>';
    echo'<ul>';
    echo'<li>';
    echo  ("<h4>$parentsInscrits->num_rows Parent(s) inscrit(s)</h4>");
    echo'</li>';
    echo'<li>';
    echo  ("<h4>$enfantsInscrits->num_rows enfant(s) incrit(s) </h4>");
    echo'</li>';
    echo'</ul>';
    echo'</i>';
    echo'<br/>';
    echo'<br/>';

    echo"<h2 class='catStat'> Statistiques : Le chiffre d'affaire </h2>";
    echo  ("<h4>$garde->num_rows gardes effectuées dans l'année </h4>");




}



?>

</body>
</html>
