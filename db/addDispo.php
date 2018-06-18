<?php
ob_start();
require_once '../db/connection.php';
session_start();
$email = $_SESSION['user']['email'];

if (compare($_POST['debut'],$_POST['fin'])) {
  if (isset($_POST['type']) && $_POST['type'] == 'same') { //rajoute des dispos avec des horaires identiques
    $debut = $_POST['debut'][0];
    $fin = $_POST['fin'][0];
    switch ($_POST['dispo']) {
      case 'work':
        $jours = [1,2,3,4,5];
        break;
      case 'all':
        $jours = [1,2,3,4,5,6,0];
        break;
      case 'ponct':
        $jours = $_POST['jours'];
        break;
    }
    insertFix($jours,$debut,$fin,$email); //insert les dispos
  } else {
    insert($_POST['jours'],$_POST['debut'],$_POST['fin'],$email); //insert les dispos
  }
} else {
  header('Location: ..\forms\dispo.html?error'); //redirige si il y a une erreur
}

//permet de vérifier que le debut commence avant la fin
function compare($debut,$fin) {
  for ($i=0; $i < count($debut); $i++) {
    if ($debut[$i] >= $fin[$i]) {
      return FALSE;
    }
  }
  return TRUE;
}

//Insert les dispos
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

//insert les dispos fix (meme horaire de début et fin chaques jours)
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
ob_end_flush();
?>
