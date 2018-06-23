<?php

require_once 'connection.php';

function gardeAnnée($annee){
  global $conn;
  $date =date('Y-m-d H:i:s');

$finannee=$annee+1;
  $sql = "SELECT *FROM garde WHERE debut>'$annee-01-01 00:00:00' "."AND debut < '$finannee-01-01 00:00:00' AND fin <'$date'";
  $gardeannee =$conn->query($sql);
  return $gardeannee;
}

?>
