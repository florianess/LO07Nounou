<?php
  //Permet de vérifier si l'utilisateur est autorisé à accéder à la page
  session_start();
  if (isset($_SESSION['user']) && $_SESSION['user']['type_user'] == 'admin') {
?>
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
      <a id="logo-container" class="brand-logo grey-text text-darken-1" href="../">NounouFinder</a>
      <a class="brand-logo center  grey-text text-darken-1">Administration</a>
      <ul class="right hide-on-med-and-down">
        <li>  <a href="../db/deconnexion.php" class="btn waves-effect waves-light pink lighten-1 ">Déconnexion</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <br>
    </br>
    </br>  </br>

    <div class="row center">

        <h5 class="categorie"><b>INFORMATIONS STRATEGIQUES</b></h5>
      <br/>    <br/>
       <a href="../modules/stats.php" class="btn-large waves-effect waves-light pink lighten-3 ">Statistiques du site</a>

          <br/>    <br/>    <br/>    <br/>    <br/> <br/> <br/>



        <h5 class="categorie" ><b>RECRUTEMENT DES NOUNOUS</b></h5>
        <br/>    <br/>
       <a href="listes.php" class="btn-large  waves-effect waves-light pink lighten-3 ">Listes de Nounous</a>

    </div>
  </div>
</div>


</br></br></br></br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

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
                  <li><a class="grey-text text-darken-1" href="../forms/NounouForm.php">Inscription en tant que Nounou</a></li>
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
</html>
<?php } else {
  echo "Accès refusé";
} ?>
