<?php

require_once 'connection.php';

$sql0 = "SELECT * FROM utilisateur WHERE email = '".$_POST["email"]."'";

$test = $conn->query($sql0);

if ($test->num_rows == 0){
  $sql = "INSERT INTO utilisateur
  (nom, prenom, ville, email, portable,photo, age, experience, presentation, type_user, password)
  VALUES ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['ville']."','".$_POST['email']."','".$_POST['portable']."','".$_FILES['photo']['tmp_name']."','".$_POST['age']."','".$_POST['experience']."','".$_POST['presentation']."','await','".password_hash($_POST["password"], PASSWORD_DEFAULT)."')";
  if ($conn->query($sql)) {
    $debutSql = "INSERT INTO utilisateur_has_langue (utilisateur_email, langue_id) VALUES ('" . $_POST['email'] . "','";
    foreach ($_POST['langues'] as $value) {
      $sql3 = $debutSql . $value . "')";
      if ($conn->query($sql3)) {
        $conn->close();
        header('Location: ../?status=create');
      } else {
        echo "Error: " . $sql3 . "<br>" . $conn->error . "<br>";
      }
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
  }
} else {
  echo 'email deja utilisé';
}
?>
