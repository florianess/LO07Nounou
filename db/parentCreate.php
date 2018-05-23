<?php

require_once 'connection.php';

$sql0 = "SELECT * FROM utilisateur WHERE email = '".$_POST["email"]."'";

$test = $conn->query($sql0);

if ($test->num_rows == 0){
  $sql = "INSERT INTO utilisateur
  (nom, prenom, ville, email, portable, photo, presentation, type_user, password)
  VALUES ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['ville']."','".$_POST['email']."','".$_POST['portable']."','".$_FILES['photo']['tmp_name']."','".$_POST['presentation']."','parent','".password_hash($_POST["password"], PASSWORD_DEFAULT)."')";
  if (!$conn->query($sql)) {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
  }
} else {
  echo 'email deja utilisé';
}

$conn->close();
?>
