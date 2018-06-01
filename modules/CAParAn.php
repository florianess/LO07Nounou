<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>Administration</title>

  <div class='divider'></div>
  <div class='section'>
  <table >
  <thead>
    <tr>
        <th>Année</th>
        <th>Nombre de gardes effectuées</th>
        <th>Chiffre d'affaire</th>
    </tr>
  </thead>
  <tbody>

<?php
require_once '../db/gardeDansLAnnee.php';

function chiffreAffaire($annee){

  $gardeannee =gardeAnnée($annee);
  $CA =0;
  foreach ($gardeannee as $value) {
  $CA+=$value["tarif"];}

  return $CA;

}

for ($annee=2016; $annee <2019 ; $annee++) {

  echo '<tr>';
  echo "<td>$annee</td> <td><b>".gardeAnnée($annee)->num_rows."</b></td> <td> <b>".chiffreAffaire($annee)."</b>€</td>";
  echo '<tr>';
}
echo'</table>';
echo'<br/>';
echo'<br/>';
echo'</div>';

?>
