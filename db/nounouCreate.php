<?php

require_once 'connection.php';

$sql0 = "SELECT * FROM utilisateur WHERE email = '".$_POST["email"]."'";

$result = $conn->query($sql0);

if ($result->num_rows == 0){
  $sql = "INSERT INTO `utilisateur`
  (`nom`, `prenom`, `ville`, `email`, `portable`,`photo`, `age`, `experience`, `presentation`, `type_user`, `password`)
  VALUES ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['ville']."','".$_POST['email']."','".$_POST['portable']."','".$_FILES['photo']['tmp_name']."','".$_POST['age']."','".$_POST['experience']."','".$_POST['presentation']."','await','".password_hash($_POST["password"], PASSWORD_DEFAULT)."')";
  $conn->query($sql);

  $result = $conn->query($sql0);
  $rows = $result->fetch_assoc();
  $debutSql = "INSERT INTO utilisateur_has_langue (utilisateur_id, langue_id) VALUES ('" . $rows['id'] . "','";
  foreach ($_POST['langues'] as $value) {
    $sql3 = $debutSql . $value . "')";
    if (!$conn->query($sql3)) {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  header('Location: ../index.html');
} else {
  echo 'email deja utilisé';
}

$conn->close();
 ?>
