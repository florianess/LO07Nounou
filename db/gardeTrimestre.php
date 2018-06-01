<?php

require_once 'connection.php';

function gardeTrimestre($annee, $trimestre){
global $conn;
switch ($trimestre) {
  case 1:
  $sql = "SELECT *FROM garde WHERE debut>='$annee-01-01 00:00:00' "."AND debut < '$annee-04-01 00:00:00'";
  $gardeTrimestre =$conn->query($sql);
    return $gardeTrimestre;
    break;
    case 2:
    $sql = "SELECT *FROM garde WHERE debut>='$annee-04-01 00:00:00' "."AND debut < '$annee-07-01 00:00:00'";
    $gardeTrimestre =$conn->query($sql);
      return $gardeTrimestre;

      break;
      case 3:
      $sql = "SELECT *FROM garde WHERE debut>='$annee-07-01 00:00:00' "."AND debut < '$annee-10-01 00:00:00'";
      $gardeTrimestre =$conn->query($sql);
        return $gardeTrimestre;

        break;
        case 4:
        $sql = "SELECT *FROM garde WHERE debut>='$annee-10-01 00:00:00' "."AND debut <= '$annee-12-31 23:59:59'";
        $gardeTrimestre =$conn->query($sql);
          return $gardeTrimestre;

          break;

}


}

?>
