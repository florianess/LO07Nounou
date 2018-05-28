<?php

require_once 'connection.php';

function gardeAnnée($année){
  global $conn;
$finannée=$année+1;
  $sql = "SELECT *FROM garde WHERE debut>'$année-01-01 00:00:00' "."AND fin < '$finannée-01-01 00:00:00'";
  $gardeannee =$conn->query($sql);
  return $gardeannee;
}



?>
