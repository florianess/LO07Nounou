<?php

require_once 'connection.php';

$sql = "SELECT nom,prenom,ville,email,portable,age,experience,presentation FROM utilisateur WHERE type_user = 'nounou'";

$nounousInscrites = $conn->query($sql);

?>
