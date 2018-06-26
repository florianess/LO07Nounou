<?php
session_start();
if (isset($_GET['note']) && isset($_GET['appreciation'])) {
  $note=$_GET['note'];
  $description=$_GET['appreciation'];
  $gardeID = $_GET['gardeID'];
  $nounou_email=$_GET['nounouemail'];
  $email = $_SESSION['user']['email'];
  ob_start();
  require_once '../db/connection.php';
  $error = FALSE;
  // on ajoute une nouvelle évaluation dans la base de données
  $sql="INSERT INTO evaluation(garde_id,nounou_email,description,note,parent_email) VALUES ('$gardeID','$nounou_email','$description','$note','$email')";
  // on change le statut de la garde : elle ne saffichera plus dans la liste des gardes à évaluer
  $sql2 = "UPDATE garde SET status='evaluee' WHERE garde_id='$gardeID'";

  if (!$conn->query($sql)) {
    echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    $error = TRUE;
  }else if (!$conn->query($sql2)) {
    echo "Error: " . $sql2 . "<br>" . $conn->error . "<br>";
    $error = TRUE;
  }

  $conn->close();
  if (!$error) {
  header('Location: ../accueil/parent.php');
  }
}else {
  ?>
<html lang="fr">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Appréciation</title>
</head>
<body>
<nav class="white nav-extended">
  <div class="container nav-wrapper">
    <a id="logo-container" href="../accueil/parent.php"class="brand-logo grey-text text-darken-1">NounouFinder</a>
    <ul class="right hide-on-med-and-down">
      <li>  <a href="../db/deconnexion.php" class="btn waves-effect waves-light  pink lighten-1">Déconnexion</a></li>
    </ul>
  </div>
</nav>
<div class="container">
  <h1> Notez la nounou :</h1>
  <br>
  <br>
  <form id="form" method="get" action="../modules/Noter.php">
    <a class="btn-flat" onclick="changeBib(1)"><img id="bib1" src="../img/iconBiberonVide.png" alt=""></a>
    <a class="btn-flat" onclick="changeBib(2)"><img id="bib2" src="../img/iconBiberonVide.png" alt=""></a>
    <a class="btn-flat" onclick="changeBib(3)"><img id="bib3" src="../img/iconBiberonVide.png" alt=""></a>
    <a class="btn-flat" onclick="changeBib(4)"><img id="bib4" src="../img/iconBiberonVide.png" alt=""></a>
    <a class="btn-flat" onclick="changeBib(5)"><img id="bib5" src="../img/iconBiberonVide.png" alt=""></a>
    <br><br><br>
    <div class="row">
      <div class="input-field col s12">
        <textarea name="appreciation" placeholder="Donnez votre avis" class="materialize-textarea" data-length="500"></textarea><br/>
        <label for="appreciation">Appréciation</label><br/>
      </div>
      <div class="col s12 center">
        <button class="btn-large waves-effect waves-light pink lighten-2" type="submit">Envoyer
          <i class="material-icons right">send</i>
        </button>
      </div>
    </div>
  <input id="note" type="hidden" name="note" value="0"/>
  <input  name="nounouemail" type='hidden' value=<?php echo $_GET['nounouemail']?>>
  <input  name="gardeID"  type='hidden' value=<?php echo $_GET['gardeID']?>>

  </form>
</div>
<footer class="white page-footer">
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
  <div class=" grey lighten-1 footer-copyright">
    <div class="container">
    © 2018 Copyright nounoufinder.com
    <a class="white-text right" href="../index.html">Accueil</a>
    </div>
  </div>
</footer>
<script src="../js/materialize.js"></script>
<script src="../js/eval.js"></script>
</body>
</html>
<?php } ?>
