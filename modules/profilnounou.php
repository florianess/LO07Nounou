<?php
  session_start();
  if (isset($_SESSION['user']) && $_SESSION['user']['type_user'] == 'parent') {
?>
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
<body  id="profil">
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

require_once '../db/connection.php';


$sql0 = "SELECT * FROM utilisateur WHERE email = '".$_GET["email"]."'";

$nounou= $conn->query($sql0);
$row = $nounou->fetch_assoc();
echo "<br/><h3> Profil Nounou </h3><br/>";

  echo "<h5> Nom : <i>".$row['nom']."</i></h5>";
  echo "<h5> Prénom : <i>".$row['prenom']."</i></h5>";
  echo "<h5> Ville : <i>".$row['ville']."</i></h5>";

  echo "<h5> Age: <i>".$row['age']."</i></h5><br/>";
  echo "<h5> Présentation personnelle: <i>".$row['presentation']."</i></h5>";

echo "</div>";

 ?>
  </body>
 <footer class=" white page-footer">
   <div class="container white">
     <div class="row">
       <div class="col l6 s12">
         <h5 class="black-text">Contactez nous</h5>
         <p class="grey-text text-darken-1">contact@NounouFinder.com</p>
       </div>
       <div class="col l4 offset-l2 s12">
         <h5 class="black-text">Services</h5>
         <ul>
           <li><a class="grey-text text-darken-1" href="forms/NounouForm.html">Inscription en tant que Nounou</a></li>
           <li><a class="grey-text text-darken-1" href="forms/ParentsForm.html">Inscription en tant que Parent</a></li>
         </ul>
       </div>
     </div>
   </div>
   <div class="  grey lighten-2 foooter-copyright">
     <div class="container">
     © 2018 Copyright nounoufinder.com
     <a class="white-text right" href="../index.html">Accueil</a>
     </div>
   </div>  </footer>


   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
   <script type="text/javascript" src="../js/initParent.js"></script>

 </html>

 <?php } else {
   echo "Accèes refusé";
 } ?>
