<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>Administration</title>


  <table >
  <thead>
    <tr>
        <th>Mois</th>
        <th>Nombre de gardes effectuées</th>
        <th>Chiffre d'affaire</th>
    </tr>
  </thead>
  <tbody>

<?php
require_once '../db/gardeTrimestre.php';

function chiffreAffaireTrimestre($annee,$trimestre){

  $gardeTrimestre =gardeTrimestre($annee,$trimestre);
  $CA =0;
  foreach ($gardeTrimestre as $value) {
  $CA+=$value["tarif"];
}

  return $CA;
}



for ($annee=2016; $annee <2019 ; $annee++) {
for ($i=1; $i<5 ; $i++) {
  echo '<tr>';
       echo "<td>$annee : Trimestre $i</td> <td><b>".gardeTrimestre($annee, $i)->num_rows."</b></td> <td> <b>".chiffreAffaireTrimestre($annee,$i)."</b>€</td>";
       echo '<tr>';
}
}



echo'</table>';
echo'<br/>';
echo'<br/>';

?>
