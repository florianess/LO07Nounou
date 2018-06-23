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
$sql = "SELECT nom,prenom,ville,email,photo,portable,age,experience,presentation FROM utilisateur WHERE email='".$_GET['email']."'";

$nounou = $conn->query($sql);
$row = $nounou->fetch_row();
$sql2 = "SELECT garde_id, debut, fin, email_parent, tarif, status FROM garde WHERE  nounou_email='".$_GET['email']."' AND status='evaluee' ";
$garde = $conn->query($sql2);
echo '<img src="data:image/jpeg;base64,'.base64_encode( $row[4] ).'" width="200"/>';
echo "<h6> Prénom :<i> $row[1]</i></h6>";
echo "<h6> Nom : <i>$row[0]</i></h6>";
echo "<h6> Age : <i>$row[6]</i></h6>";
echo "<h6> E-mail :<i> $row[3]</i></h6>";
echo "<h6> Téléphone :<i> $row[5]</i></h6>";
echo "<h6> Expérience :<i> $row[7]</i></h6>";
echo "<h6> Présentation personnelle : <i> $row[8]</i></h6><br/>";
echo "<h6> Nombre de gardes : <i>".$garde->num_rows ."</i></h6><br/>";


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

    echo "</table>";
    echo "</div>";
    echo "<br/> <br/>";
    echo "<br/> <br/>";






   ?>
   <footer class="whpage-footer">
             <div class="container">
               <div class="row">
                 <div class="col l6 s12">
                   <h5 class="black-text">Contactez nous</h5>
                   <p class="grey-text text-darken-1">contact@NounouFinder.com</p>


                 </div>
                 <div class="col l4 offset-l2 s12">
                   <h5 class="black-text">Services</h5>
                   <ul>
                     <li><a class="grey-text text-darken-1" href="../forms/NounouForm.html">Inscription en tant que Nounou</a></li>
                     <li><a class="grey-text text-darken-1" href="../forms/ParentsForm.html">Inscription en tant que Parent</a></li>
                   </ul>
                 </div>
               </div>
             </div>
             <div class=" grey lighten-3 footer-copyright">
               <div class="container">
               © 2018 Copyright NounouFinder.com
               <a class="grey-text text-darken-1 right" href="../index.php">Accueil</a>
               </div>
             </div>
           </footer>
         </body>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

        </html>
