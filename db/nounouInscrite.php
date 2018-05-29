<?php

require_once 'connection.php';

$sql = "SELECT nom,prenom,ville,email,portable,age,experience,presentation FROM utilisateur WHERE type_user = 'nounou'";
$sql2 = "SELECT nom,prenom,ville,email,portable,age,experience,presentation FROM utilisateur WHERE type_user = 'block'";

$nounousInscrites = $conn->query($sql);
$nounousBloquées = $conn->query($sql2);

?>
