<?php

require_once 'connection.php';

$sql = "SELECT nom,prenom,ville,email,portable,age,experience,presentation FROM utilisateur WHERE type_user = 'parent'";

$parentsInscrits = $conn->query($sql);

?>
