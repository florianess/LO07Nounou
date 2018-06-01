<?php

require_once 'connection.php';

function gardeAnnée($annee){
  global $conn;
$finannee=$annee+1;
  $sql = "SELECT *FROM garde WHERE debut>'$annee-01-01 00:00:00' "."AND debut < '$finannee-01-01 00:00:00'";
  $gardeannee =$conn->query($sql);
  return $gardeannee;
}

?>
