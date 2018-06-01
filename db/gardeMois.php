<?php

require_once 'connection.php';

function gardeMois($annee,$mois,$key){
global $conn;
$finannee=$annee+1;
$debutmois=$key+1;
$finmois=$debutmois+1;

$sql = "SELECT *FROM garde WHERE debut>='$annee-$debutmois-01 00:00:00' "."AND debut < '$annee-$finmois-01 00:00:00'";
$gardemois =$conn->query($sql);
  return $gardemois;
}

?>
