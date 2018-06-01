<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>Administration</title>
  <div class="container nav-content">
    <ul id="tabs" class="tabs">
      <li class="tab"><a class="grey-text text-darken-1" href="#2016">2016</a></li>
     <li class="tab"><a class="grey-text text-darken-1 " href="#2017">2017</a></li>
      <li class="tab"><a class="grey-text text-darken-1 active  " href="#2018">2018</a></li>
    </ul>
  </div>
  </nav>
  <div class="container">
  <?php


  function chiffreAffaireMois($annee,$mois,$key){

    $gardemois =gardeMois($annee,$mois,$key);
    $CA =0;
    foreach ($gardemois as $value) {
    $CA+=$value["tarif"];
  }

    return $CA;
  }


function tableMois($annee){


  echo("
      <div class='divider'></div>
      <div class='section'>

      <h3> Année : $annee</h3>
    <table >
    <thead>
      <tr>
          <th>Mois</th>
          <th>Nombre de gardes effectuées</th>
          <th>Chiffre d'affaire</th>
      </tr>
    </thead>
    <tbody>

");
  require_once '../db/gardeMois.php';

  $mois= array('Janvier', 'Février','Mars','Avril','Mai', 'Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre');

  for ($i=0; $i<12 ; $i++) {
    echo '<tr>';
         echo "<td> $mois[$i] $annee</td> <td><b>".gardeMois($annee,$mois,$i)->num_rows."</b></td> <td> <b>".chiffreAffaireMois($annee,$mois,$i)."</b>€</td>";
         echo '<tr>';
  }

  echo'</table>';
  echo'<br/>';
  echo'<br/>';echo'</div>';
}


    echo '<div id="2016">';
    tableMois(2016);
    echo '</div><div id="2017">';
    tableMois(2017);
    echo '</div><div id="2018">';
    tableMois(2018);
    echo "</div>";
      echo "</div>";


  ?>
