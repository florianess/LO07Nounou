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
    switch ($row['jour']) {
      case 'Lundi':
        $e['dow'] = [1];
        break;
      case 'Mardi':
        $e['dow'] = [2];
        break;
      case 'Mercredi':
        $e['dow'] = [3];
        break;
      case 'Jeudi':
        $e['dow'] = [4];
        break;
      case 'Vendredi':
        $e['dow'] = [5];
        break;
      case 'Samedi':
        $e['dow'] = [6];
        break;
      case 'Dimanche':
        $e['dow'] = [7];
        break;
      default:
        break;
    }
    $e['start'] = $row['debut'];
    $e['end'] = $row['fin'];
    $e['rendering'] = 'background';
    array_push($events,$e);
  }
}

$sql2 = "SELECT * FROM garde WHERE nounou_email = '$email'";
$res2 = $conn->query($sql2);
if ($res2) {
  while ($row = $res2->fetch_assoc()) {
    $e = array();
    $e['id'] = $row['garde_id'];
    $e['title'] = 'Garde de ' . $row['email_parent'];
    $e['start'] = $row['debut'];
    $e['end'] = $row['fin'];
    $e['backgroundColor'] = 'red';  
    array_push($events,$e);
  }
}
echo json_encode($events);
 ?>
