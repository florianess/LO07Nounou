<?php

require_once '../db/connection.php';

for ($i=0; $i < count($_POST['nom']); $i++) {
  $sql = "INSERT INTO enfant (nom, prenom, age, info, email_parent) VALUES
  ('".$_POST['nom'][$i]."','".$_POST['prenom'][$i]."','".$_POST['age'][$i]."','".$_POST['info'][$i]."','".$_POST['email_parent']."')";
  if (!$conn->query($sql)) {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
  }
}
$conn->close();
header('Location: ../?status=create');
 ?>
