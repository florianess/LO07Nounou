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
  <div class="container">
    <h1> Administration de Nounou Finder </h1>
<br/><hr/><br/>

<?php
require_once '../db/newNounous.php';
require_once '../db/nounouInscrite.php';
require_once '../db/parentInscrit.php';
require_once '../db/enfantInscrit.php';
require_once '../db/gardeDansLAnnee.php';



session_start();

if (isset($_SESSION['user']) && $_SESSION['user']['type_user'] == 'admin') {

function chiffreAffaire($annee){

  $gardeannee =gardeAnnée($annee);
  $CA =0;
  foreach ($gardeannee as $value) {
  $CA+=$value["tarif"];}

  return $CA;

}

  echo"<h4 class='catStat'> Statistiques : Le nombre d'inscrits </h4>";
  echo'<br/>';


  echo("<h6 class ='nombreInscrits' >Le nombre de Nounous :</h6>");

  echo '<ul>';
  echo '<li>';
  echo "<h7><b>$nounous->num_rows</b> nouveau(x) candidat(s) 'Nounou' à valider</h7>";
  echo '</li>';
  echo '<li>';
  echo "<h7><b>$nounousInscrites->num_rows</b> Nounou(s) inscrit(e)(s) et active</h7>";
  echo '</li>';
  echo '<li>';
  echo "<h7><b>$nounousBloquées->num_rows</b> Nounou(s) bloquées</h7>";
  echo '</li>';
  echo '</ul>';
  echo "<h6 class ='nombreInscrits'>Le nombre de Familles :</h6>";
  echo '<ul>';
  echo '<li>';
  echo "<h7><b>$parentsInscrits->num_rows</b> Parent(s) inscrit(s)</h7>";
  echo '</li>';
  echo '<li>';
  echo "<h7><b>$enfantsInscrits->num_rows</b> Enfant(s) incrit(s) </h7>";
  echo '</li>';
  echo '</ul>';
  echo '<br/>';
  echo '<hr/>';
  echo "<h4 class='catStat'> Statistiques : Le chiffre d'affaire </h4>";
  echo '<br/>';
?>

  <table id='table'>
  <thead>
    <tr>
        <th>Année</th>
        <th>Nombre de gardes effectuées</th>
        <th>Chiffre d'affaire</th>
    </tr>
  </thead>
  <tbody>

<?php
for ($annee=2010; $annee <2019 ; $annee++) {

  echo '<tr>';
  echo "<td>$annee</td> <td><b>".gardeAnnée($annee)->num_rows."</b></td> <td> <b>".chiffreAffaire($annee)."</b>€</td>";
  echo '<tr>';
}
echo'</table>';
echo'<br/>';
echo'<br/>';
} else {
 echo "<h1 class='red-text'>Accees refusé</h1>";
}
?>

</body>
</html>
