<?php

require_once 'connection.php';

function gardeMois($annee,$mois,$key){
  $date =date('Y-m-d H:i:s');

global $conn;
$debutmois=$key+1;
$finmois=$debutmois+1;
 if ($finmois==10) {
  $debutmois='0'.$debutmois;
}else if ($finmois<10) {
  $debutmois='0'.$debutmois;
  $finmois='0'.$finmois;


}
$sql = "SELECT *FROM garde WHERE debut>='$annee-$debutmois-01 00:00:00' "."AND debut < '$annee-$finmois-01 00:00:00'  AND fin <'$date'";

$gardemois =$conn->query($sql);
  return $gardemois;
}

?>
