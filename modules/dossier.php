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
      <a id="logo-container" href="../" class="brand-logo  grey-text text-darken-1">NounouFinder</a>
      <a class="brand-logo center  grey-text text-darken-1">Dossier Nounou</a>
      <ul class="right hide-on-med-and-down">
        <li>  <a href="../db/deconnexion.php" class="btn waves-effect waves-light pink lighten-1">Déconnexion</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <br>
<?php require_once '../db/connection.php';
$sql = "SELECT nom,prenom,ville,email,portable,age,experience,presentation FROM utilisateur WHERE email='".$_GET['email']."'";

$nounou = $conn->query($sql);
$row = $nounou->fetch_row();
$sql2 = "SELECT garde_id, debut, fin, email_parent, tarif FROM garde WHERE  nounou_email='".$_GET['email']."'";
$garde = $conn->query($sql2);
echo("<h5> Prénom : $row[1]</h5>");
echo("<h5> Nom : $row[0]</5>");
echo("<h5> E-mail : ".$row[3]."</h5>");
echo("<h5> Nombre de gardes : ".$garde->num_rows ."</h5><br/>");


?>


<table id='table'>
  <thead>

  <tr>
      <th>Garde</th>
      <th>Parent</th>
      <th>Evaluation du parent</th>
      <th>Revenu</th>
  </tr>
</thead>
<tbody>

  <?php
      while ($row2 = $garde->fetch_row()) {


        $sql3 = "SELECT description, note FROM evaluation WHERE garde_id='$row2[0]'";

        $evaluatoon= $conn->query($sql3);
        $row3 = $evaluatoon->fetch_row();
          echo "<tr>";
              echo "<td>"."<b>Du </b> $row2[1]<b> au </b> $row2[2]" ."</td>";


              echo "<td>$row2[3]</td>";
              echo "<td>Description : $row3[0]<br/> Note : $row3[1] </td>";
              echo "<td>$row2[4]</td>";
              echo "</tr>";

}







   ?>
