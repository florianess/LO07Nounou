<?php
require_once '../db/connection.php';
session_start();
$email = $_SESSION['user']['email'];

if (compare($_POST['debut'],$_POST['fin'])) {
  if (isset($_POST['type']) && $_POST['type'] == 'same') {
    $debut = $_POST['debut'][0];
    $fin = $_POST['fin'][0];
    switch ($_POST['dispo']) {
      case 'work':
        $jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi'];
        break;
      case 'all':
        $jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];
        break;
      case 'ponct':
        $jours = $_POST['jours'];
        break;
    }
    insertFix($jours,$debut,$fin,$email);
  } else {
    insert($_POST['jours'],$_POST['debut'],$_POST['fin'],$email);
  }
} else {
  header('Location: ..\forms\dispo.html?error');
}


function compare($debut,$fin) {
  for ($i=0; $i < count($debut); $i++) {
    if ($debut[$i] >= $fin[$i]) {
      return FALSE;
    }
  }
  return TRUE;
}

function insert($jours,$debut,$fin,$email)
{
  global $conn;
  $error = FALSE;
  for ($i=0; $i < count($jours); $i++) {
    $sql = "INSERT INTO dispo(jour, debut, fin, nounou_email) VALUES ('$jours[$i]','$debut[$i]','$fin[$i]','$email')";
    if (!$conn->query($sql)) {
      echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
      $error = TRUE;
    }
  }
  $conn->close();
  if (!$error) {
    header('Location: ../accueil/nounou.php');
  }
}

function insertFix($jours,$debut,$fin,$email)
{
  global $conn;
  $error = FALSE;
  foreach ($jours as $value) {
    $sql = "INSERT INTO dispo(jour, debut, fin, nounou_email) VALUES ('$value','$debut','$fin','$email')";
    if (!$conn->query($sql)) {
      echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
      $error = TRUE;
    }
  }
  $conn->close();
  if (!$error) {
    header('Location: ../accueil/nounou.php');
  }
}
?>
