<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>Administration</title>
</head>
<body class="administration">
  <nav class="white">
    <div class="container nav-wrapper">
      <a id="logo-container" href="../accueil/admin.php" class="brand-logo  grey-text text-darken-1">NounouFinder</a>
      <a class="brand-logo center  grey-text text-darken-1">Dossier Nounou</a>
    </div>
  </nav>
  <div class="container">
    <br>
<?php require_once '../db/connection.php';;
$sql = "SELECT nom,prenom,ville,email,portable,age,experience,presentation FROM utilisateur WHERE email='".$_GET['email']."'";

$nounou = $conn->query($sql);
$row = $nounou->fetch_row();
echo("<h5> Prénom : $row[1]</h5>");
echo("<h5> Nom : $row[0]</5>");

echo("<h5> E-mail : ".$row[3]."</h5><br/>");

?>

<br/>
<table id='table'>
  <tr>
      <th>Garde</th>
      <th>Famille</th>
      <th>Evaluation du parent</th>
      <th>Revenu</th>
  </tr>
