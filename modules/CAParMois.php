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
        <th>Mois</th>
        <th>Nombre de gardes effectuées</th>
        <th>Chiffre d'affaire</th>
    </tr>
  </thead>
  <tbody>

<?php
require_once '../db/gardeMois.php';

function chiffreAffaireMois($annee,$mois,$key){

  $gardemois =gardeMois($annee,$mois,$key);
  $CA =0;
  foreach ($gardemois as $value) {
  $CA+=$value["tarif"];
}

  return $CA;
}


$mois= array('Janvier', 'Février','Mars','Avril','Mai', 'Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre');

for ($annee=2016; $annee <2019 ; $annee++) {
for ($i=0; $i<12 ; $i++) {
  echo '<tr>';
       echo "<td> $mois[$i] $annee</td> <td><b>".gardeMois($annee,$mois,$i)->num_rows."</b></td> <td> <b>".chiffreAffaireMois($annee,$mois,$i)."</b>€</td>";
       echo '<tr>';
}
}



echo'</table>';
echo'<br/>';
echo'<br/>';echo'</div>';

?>
