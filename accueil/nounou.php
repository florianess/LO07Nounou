<?php
require_once '../db/connection.php';

session_start();

$sqlDispo = "SELECT * FROM dispo WHERE nounou_email = '".$_SESSION['user']['email']."'";

$res = $conn->query($sqlDispo);
if($res->num_rows == 0) {
  header('Location: ..\forms\dispo.html');
} else {
  echo "CC";
}
?>
