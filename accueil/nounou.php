<?php
require_once '../db/connection.php';

//Permet de vérifier si l'utilisateur est autorisé à accéder à la page
session_start();

$sqlDispo = "SELECT * FROM dispo WHERE nounou_email = '".$_SESSION['user']['email']."'";

$res = $conn->query($sqlDispo);
//Si la nounou n'a pas de disponibilité enregistrée, alors elle est redirigé vers la page dispo
if($res->num_rows == 0) {
  header('Location: ..\forms\dispo.html');
} else {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
  <link rel="stylesheet" media="print" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css">
  <link rel="stylesheet" href="../style/style.css">
  <title>Nounou Planning</title>
</head>
<body class="administration">
  <nav class="white">
    <div class="container nav-wrapper">
      <a id="logo-container" class="brand-logo grey-text text-darken-1" href="../">NounouFinder</a>
      <ul class="right hide-on-med-and-down">
        <li>  <a href="../modules/dossier.php?email=<?php echo $_SESSION['user']['email'] ?>" class="btn waves-effect waves-light  pink lighten-1">Mon profil</a></li>
        <li>  <a href="../db/deconnexion.php" class="btn waves-effect waves-light  pink lighten-1">Déconnexion</a></li>
      </ul>
    </div>
  </nav>
  <div class='container'>
    <h1 class='center'>Ton agenda</h1>
    <br><br><hr><br>
    <div id='calendar'></div>
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
              <a class="grey-text text-darken-1 right" href="../index.php">Accueil</a>
              </div>
            </div>
  </footer>
  <!--- Importer les librairies javacript nécessaires-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/locale/fr.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/fr.js"></script>
  <script src="../js/initNounou.js"></script>

</body>

<?php
}
?>
