<?php

require_once 'connection.php';

$sql = "INSERT INTO `utilisateur`
(`nom`, `prenom`, `ville`, `email`, `portable`,`photo`, `age`, `experience`, `presentation`, `type_user`, `password`)
VALUES ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['ville']."','".$_POST['email']."','".$_POST['portable']."','".$_FILES['photo']['tmp_name']."','".$_POST['age']."','".$_POST['experience']."','".$_POST['presentation']."','await','".password_hash($_POST["password"], PASSWORD_DEFAULT)."')";

if ($conn->query($sql)) {
    header('Location: ../index.html');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 ?>
