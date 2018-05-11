<?php
$form=<<<END
<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Parents Formulaire</title>
</head>
<body>
  <div class="container">
    <h1 class="center"> Formulaire d'incription : Parents </h1>
  </br>
</br>
    <form class="col s12" method="post" action="ParentsForm.php">
      <div class="row">
        <div class="file-field input-field col s12">
          <div class="btn">
            <span>Votre photo de profil</span>
            <input type="file" name="Photo">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="Nom" type="text" class="validate" name ="Nom">
          <label for="Nom">Nom</label>
        </div>
        <div class="input-field col s6">
          <input id="Prenom" type="text" class="validate" name ="Prénom">
          <label for="Prenom">Prénom</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="Email" type="Email" class="validate" name ="Email">
          <label for="Email">Email</label>
        </div>
        <div class="input-field col s6">
          <input id="Portable" type="tel" class="validate" name ="Portable">
          <label for="Portable">Portable</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="Ville" type="text" class="validate" name ="Ville">
          <label for="Ville">Ville</label>
        </div>
        <div class="input-field col s6">
          <input id="Nombre d'enfants" type="number" class="validate" name ="Nombre d'enfants">
          <label>Nombre d'enfants à garder</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          </br>
        <textarea id="Infos générales" name="Infos générales" class="validate">
        </textarea>
          <label for="Infos générales">Informations générales</label></br>
        </div>
      </div>
      <div class="row">
        <div class="col s12 center">
          <button class="btn-large waves-effect waves-light" type="submit">Soumettre
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script type="text/javascript" src="../js/FormNounou.js"></script>
</body>
</html>
END;



$text = <<<END

<div class="row">
  <div class="input-field col s6">
    <input id="nom" type="text" class="validate" name ="nom">
    <label for="nom">Nom</label>
    </div>
    </div>
    <div class="row">

    <div class="input-field col s6">
      <input id="prenom" type="text" class="validate" name ="prénom">
      <label for="prenom">Prénom</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <input id="age" type="number" class="validate" name ="age">
      <label for="age">Age</label>
    </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        </br>
      <textarea id="infos" name="infos" class="validate">
      </textarea>
        <label for="infos">Informations particulières </label></br>
      </div>
    </div>

END;

if(isset($_POST["Nombre_d'enfants"]) && $_POST["Nombre_d'enfants"]>0 && isset($_POST["Nom"]) && isset($_POST["Prénom"]) && isset($_POST["Portable"]) && isset($_POST["Ville"]) && isset($_POST["Email"])){
debutPagehtml();
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

$nombreEnfants=$_POST["Nombre_d'enfants"];
debutFormEnfants();
for ($i=0; $i <$nombreEnfants ; $i++) {
  echo("<h3> Enfant ". ($i+1)."</h3>");
formEnfants();
echo('<hr/><br/>  </br>');
}
finFormEnfants();
}

else{

  form();

}

function form(){
global $form;
echo $form;
}





function formEnfants(){
global $text;
echo $text;
}


function debutPagehtml(){
  echo("<!DOCTYPE html>
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
    <div class='container'>
      ");
}


function debutFormEnfants(){
echo("<h1 class='center'> Informations sur vos enfants</h1>
</br>
</br>
<form class='col s12' method='post' action=''>");
}

function finFormEnfants(){
  echo("  <div class='row'>
    <div class='col s12 center'>
      <button class='btn-large waves-effect waves-light type='submit'>Soumettre
        <i class='material-icons right'>send</i>
      </button>
    </div>
  </div>
  </form>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js'></script>
  <script type='text/javascript' src='../js/FormNounou.js'></script>
</body>
</html>");
}

 ?>
