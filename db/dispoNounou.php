<?php

require_once 'connection.php';

session_start();

$email = null;

if ($_SESSION['user']) {
  $email = $_SESSION['user']['email'];
}

$sql = "SELECT jour, debut, fin FROM dispo WHERE nounou_email = '$email'";
$res = $conn->query($sql);
$events = array();

if ($res) {
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
//garde de prenom a ville
//info: info
//email_parent
//portable
$sql2 = "SELECT garde.garde_id,debut,fin,enfant.prenom,parent.ville,parent.portable,parent.email,enfant.info FROM `garde`
INNER JOIN garde_has_enfant gn ON garde.garde_id = gn.garde_id
INNER JOIN enfant ON gn.enfant_id = enfant.enfant_id
INNER JOIN utilisateur parent ON garde.email_parent = parent.email
WHERE nounou_email = '$email'";
$res2 = $conn->query($sql2);
if ($res2) {
  while ($row = $res2->fetch_assoc()) {
    $e = array();
    $e['id'] = $row['garde_id'];
    $e['title'] = 'Garde de ' . $row['prenom'] . ' a '. $row['ville'];
    $e['info'] = 'Info: ' .$row['info'];
    $e['email'] = $row['email'];
    $e['portable'] = '0'.$row['portable'];
    $e['start'] = $row['debut'];
    $e['end'] = $row['fin'];
    $e['backgroundColor'] = 'red';
    array_push($events,$e);
  }
}
echo json_encode($events);
 ?>
