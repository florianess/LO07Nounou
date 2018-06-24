<?php

require_once 'connection.php';

session_start();

$email = null;

if ($_SESSION['user']) {
  $email = $_SESSION['user']['email'];
}

//Query des dispos d'une nounou
$sql = "SELECT jour, debut, fin FROM dispo WHERE nounou_email = '$email'";
$res = $conn->query($sql);
$events = array();

if ($res) {
  //ajout chaque dispo dans le format Event (Fullcalendar.js)
  while ($row = $res->fetch_assoc()) {
    $e = array();
    if (strlen($row['jour']) == 1) {
      $e['dow'] = [$row['jour']];
      $e['start'] = $row['debut'];
      $e['end'] = $row['fin'];
    } else {
      $date = DateTime::createFromFormat('d/m/Y', $row['jour']);
      $e['start'] = $date->format('Y-m-d').' '.$row['debut'];
      $e['end'] = $date->format('Y-m-d').' '.$row['fin'];
    }
    $e['rendering'] = 'background';
    array_push($events,$e);
  }
}

//récupère les gardes de la nounou plus les infos adéquats
$sql2 = "SELECT garde.garde_id,debut,fin,enfant.prenom,parent.ville,parent.portable,parent.email,enfant.info FROM `garde`
INNER JOIN garde_has_enfant gn ON garde.garde_id = gn.garde_id
INNER JOIN enfant ON gn.enfant_id = enfant.enfant_id
INNER JOIN utilisateur parent ON garde.email_parent = parent.email
WHERE nounou_email = '$email'";
$res2 = $conn->query($sql2);
if ($res2) {
  while ($row = $res2->fetch_assoc()) {
    //Ajout les gardes dans la forme Event
    $e = array();
    $e['id'] = $row['garde_id'];
    $e['title'] = 'Garde de ' . $row['prenom'] . ' a '. $row['ville'];
    $e['info'] = 'Info: ' .$row['info'];
    $e['email'] = $row['email'];
    $e['portable'] = '0'.$row['portable'];
    $debut = explode(" ",$row['debut']);
    if(strlen($debut[0])==1){
      $e['dow']=[intval($debut[0])];
      $e['start'] = $debut[1];
      $end = explode(" ",$row['fin']);
      $e['end'] = $end[1];
    } else {
      $e['start'] = $row['debut'];
      $e['end'] = $row['fin'];
    }
    $e['backgroundColor'] = 'red';
    array_push($events,$e);
  }
}
//return le tableau d'events sous forme de JSON pour être interprêter pas Fullcalendar
echo json_encode($events);
 ?>
