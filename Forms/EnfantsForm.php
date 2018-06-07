<!DOCTYPE html>
<html lang='fr' dir='ltr'>
  <head>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css'>
  <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>

    <title>Formulaire enfants</title>
  </head>
  <body>
    <nav class="white" role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="../index.html" class="brand-logo grey-text text-darken-1"> NounouFinder</a>
      </div>
    </nav>

  <div class='container'>

<?php

require_once '../db/parentCreate.php';

function formValide(){
  foreach ($_POST as $key => $value) {
    if ( $key!="filepath" &&  $key!="presentation") { //facultatif dans le formulaire
      if($value == ''){
        return false;
      }
    }
  }
  return true;
}

if(formValide() && $_POST["nbenfants"]>0){
  echo "<h2  class='center'> Vos infos : </h2> <ul>";
  foreach ($_POST as $key => $value) {
    echo "<li>" . $key . " : ";
    if (count($value) == 1){
      echo $value . "</li>";
    } else {
      echo implode(", ",$value);
    };
  }
  echo "</ul>";
  $nombreEnfants = $_POST["nbenfants"];
  debutFormEnfants();
  for ($i=0; $i <$nombreEnfants ; $i++) {
    echo("<h3> Enfant ". ($i+1)."</h3>");
    formEnfants($i);
  }
} else {
  header('Location: ParentsForm.html');
}


function debutFormEnfants(){
  echo("<h1 class='center'> Informations sur vos enfants</h1>
  </br>
  </br>
  <form class='col s12' method='post' action='../db/enfantCreate.php'>");
}

function formEnfants($i) {
  print "
  <div class='row'>
    <div class='input-field col s6'>
      <input id='nom$i' type='text' class='validate' name ='nom[]'>
      <label for='nom$i'>Nom</label>
      </div>
      </div>
      <div class='row'>

      <div class='input-field col s6'>
        <input id='prenom$i' type='text' class='validate' name ='prenom[]'>
        <label for='prenom$i'>Prénom</label>
      </div>
    </div>
    <div class='row'>
      <div class='input-field col s6'>
        <input id='age$i' type='number' class='validate' name ='age[]'>
        <label for='age$i'>Age</label>
      </div>
      </div>
      <div class='row'>
        <div class='input-field col s1'>
          <label>
          <input id='genreM$i' type='radio' class='validate' name ='genre[$i]' value='M'>
           <span>M</span>
             </label>
           </div>
             <div class='input-field col s1'>
               <label>
          <input id='genreF$i' type='radio' class='validate' name ='genre[$i]' value='F'>
           <span>F</span>
             </label>

        </div>
        </div>
        <br/>
        </br>
      <div class='row'>
        <div class='input-field col s6'>
          </br>
        <textarea id='infos' name='info[]'  class='materialize-textarea' data-length='1200'>
        </textarea>
          <label for='infos'>Informations particulières </label></br>
        </div>
      </div>
      <hr/><br/>  </br>";
}

?>

<div class='row'>
  <div class='col s12 center'>
    <button class='btn-large waves-effect pink waves-light' type='submit'>Soumettre
      <i class='material-icons right'>send</i>
    </button>
  </div>
  </div>
  <input type="hidden" name="email_parent" value=<?php echo $_POST['email'] ?>>
  </form>
  </div>
  <br/>      <br/>
  <br/>  <br/>

  <hr/>

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

  <script type="text/javascript" src="../js/Form.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js'></script>
</body>
</html>
