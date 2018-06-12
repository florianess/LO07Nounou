
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


  <title>Profil Nounou</title>
</head>
<body  class="pink lighten-5">
  <nav class="white nav-extended">
    <div class="container nav-wrapper">
      <a id="logo-container" href="../accueil/parent.php" class="brand-logo grey-text text-darken-1">NounouFinder</a>
      <ul class="right hide-on-med-and-down">
        <li>  <a href="../db/deconnexion.php" class="btn waves-effect waves-light  pink lighten-1">Déconnexion</a></li>
      </ul>
    </div>
</nav>


<div class="container">

<?php

  session_start();
  if (isset($_SESSION['user']) && $_SESSION['user']['type_user'] == 'parent') {
require_once '../db/connection.php';


$sql0 = "SELECT * FROM utilisateur WHERE email = '".$_GET["email"]."'";

$nounou= $conn->query($sql0);
$row = $nounou->fetch_assoc();
echo "<br/><h3> Profil Nounou </h3><br/>";
  echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['photo'] ).'"/>';

  echo "<h6> Nom : <i>".$row['nom']."</i></h6>";
  echo "<h6> Prénom : <i>".$row['prenom']."</i></h6>";
  echo "<h6> Ville : <i>".$row['ville']."</i></h6>";

  echo "<h6> Age : <i>".$row['age']."</i></h6>";
  echo "<h6> Présentation personnelle : <i>".$row['presentation']."</i></h6><br/><br/>";
  echo "<hr/><br/>";

  echo "<h6> Evaluations de parents reçues :</h6><br/>";


echo"
 <table>

   <tr>
       <th>Date de la garde</th>
       <th>Parent</th>
       <th>Evaluation du parent</th>
   </tr>";



   $sql2 = "SELECT garde_id, debut, fin, email_parent, tarif FROM garde WHERE  nounou_email='".$_GET['email']."'";
   $garde = $conn->query($sql2);
       while ($row2 = $garde->fetch_row()) {


         $sql3 = "SELECT description, note FROM evaluation WHERE garde_id='$row2[0]'";
         $evaluation= $conn->query($sql3);
         $row3 = $evaluation->fetch_row();

         $sqlparent = "SELECT nom, prenom FROM utilisateur WHERE email='$row2[3]'";
         $parent= $conn->query($sqlparent);
         $rowparent = $parent->fetch_row();

           echo "<tr>";
               echo "<td>"."$row2[1]<b>" ."</td>";
               echo "<td>$rowparent[0] $rowparent[1]</td>";
               echo "<td>$row3[0]<br/> Note : $row3[1]/5 </td>";
               echo "</tr>";

 }
 echo "</table>";
 echo "<br/> <br/>";
 echo "<br/> <br/>";


 } else {
   echo "Accèes refusé";
 } ?>

</div>
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
             <a class="grey-text text-darken-1 right" href="../index.html">Accueil</a>
             </div>
           </div>
         </footer>
       </body>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
          <script type="text/javascript" src="../js/initParent.js"></script>
      </html>
