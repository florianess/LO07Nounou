<?php

require_once 'connection.php';
session_start();
$debut = $_SESSION['resa']['debut'] . ':00';
$fin = $_SESSION['resa']['fin'] . ':00';
$nounou_email = $_GET['email'];
$email_parent = $_SESSION['resa']['email_parent'];
$jour = $_SESSION['resa']['jour'];
$duree = $fin - $debut;
if (strlen($_SESSION['resa']['jour'])>1){ //resa occa
    $tarif = $duree * (7 + 4*(count($_SESSION['resa']['enfants'])-1));
    $date = DateTime::createFromFormat('d/m/Y', $jour);
    $jdebut = $date->format('Y-m-d') . ' ' . $debut;
    $jfin = $date->format('Y-m-d') . ' ' . $fin;
    $sql = "INSERT INTO garde (debut,fin,nounou_email,email_parent,tarif,status) VALUES ('$jdebut','$jfin','$nounou_email','$email_parent','$tarif','reservee')";
} else {
    $tarif = $duree * (10 + 5*(count($_SESSION['resa']['enfants'])-1));
    $jdebut = $jour . ' ' . $debut;
    $jfin = $jour . ' ' . $fin;
    $sql = "INSERT INTO garde (debut,fin,nounou_email,email_parent,tarif,status) VALUES ('$jdebut','$jfin','$nounou_email','$email_parent','$tarif','reservee')";
}

if($conn->query($sql)) {
    $sql2 = "SELECT MAX(garde_id) FROM garde";
    $res = $conn->query($sql2);
    $id = $res->fetch_row();
    $sql3 = "INSERT INTO garde_has_enfant (garde_id,enfant_id) VALUES ";
    foreach ($_SESSION['resa']['enfants'] as $value) {
        $sql3 .= "('$id[0]','$value'),";
    }
    $sql3 = substr($sql3, 0, -1);
    $conn->query($sql3);
    header('Location: ../accueil/parent.php?res');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
}
?>
