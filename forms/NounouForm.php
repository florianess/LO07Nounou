<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Nounou Formulaire</title>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="../index.php" class="brand-logo grey-text text-darken-1"> NounouFinder</a>
    </div>
  </nav>

  <div id="error" class="modal">
    <div class="modal-content center">
      <h4 class="red-text">ERREUR</h4>
      <p>Le formulaire est incorrect</p>
      <a class="modal-close waves-effect waves-green btn">OK</a>
    </div>
  </div>
  <div class="container">
    <h1 class="center"> Formulaire d'inscription : Nounou</h1>
    </br>
    </br>
    <form class="col s12" enctype="multipart/form-data" method="post" action="../db/nounouCreate.php">
      <div class="row">
        <div class="input-field col s12 m6">
          <input id="email" type="email" class="validate" name="email">
          <label for="email">Email</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="password" type="password" class="validate" name="password">
          <label for="password">Mot de passe</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="nom" type="text" class="validate" name ="nom">
          <label for="nom">Nom</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="prenom" type="text" class="validate" name ="prenom">
          <label for="prenom">Prénom</label>
        </div>
        <div class="file-field input-field col s12 m6">
          <div class=" pink lighten-1 btn">
            <span>Votre photo de profil</span>
            <input type="file" name="photo">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" name="filepath">
          </div>
        </div>
        <div class="input-field col s12 m6">
          <input id="portable" type="tel" class="validate" name ="portable">
          <label for="portable">Portable</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="age" type="number" class="validate" name ="age">
          <label for="age">Age</label>
        </div>
        <div class="input-field col s12 m6">
          <input id="ville" type="text" class="validate" name ="ville">
          <label for="ville">Ville</label>
        </div>
        <div class="input-field col s12 m6">
          <select multiple name ='langues[]' class='select'>
            <option value='' disabled selected>Choix des langues</option>
            <?php require_once 'langues.php'?>
          </select>
          <label>Langues parlées</label>
        </div>
        <div class="input-field col s12 m6">
          <select name = "experience" class="select">
            <option value="" disabled selected>Expérience</option>
            <option value="debutant">Débutant.e</option>
            <option value="occasionnel">Occasionnel.le</option>
            <option value="experimente">Expérimenté.e</option>
          </select>
          <label>Niveau d'expérience</label>
        </div>
        <div class="input-field col s12">
        <textarea name="presentation" placeholder="Présentez vous..." class="materialize-textarea" data-length="1200"></textarea>
          <label for="presentation">Présentation</label>
        </div>
        <div class="col s12 center">
          <button class="btn-large waves-effect waves-light pink" type="submit">Soumettre
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </form>
  </div>
  <br><br><br><br><hr>
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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script type="text/javascript" src="../js/Form.js"></script>
</body>
</html>
