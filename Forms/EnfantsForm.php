<?php

$formEnfants = <<<END

<div class="row">
  <div class="input-field col s6">
    <input id="nom" type="text" class="validate" name ="nom[]">
    <label for="nom">Nom</label>
    </div>
    </div>
    <div class="row">

    <div class="input-field col s6">
      <input id="prenom" type="text" class="validate" name ="prénom[]">
      <label for="prenom">Prénom</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <input id="age" type="number" class="validate" name ="age[]">
      <label for="age">Age</label>
    </div>
    </div>
    <div class="row">
      <div class="input-field col s1">
        <label>
        <input id="genreM" type="radio" class="validate" name ="genre[]" value="M">
         <span>M</span>
           </label>
         </div>
           <div class="input-field col s1">
             <label>
        <input id="genreF" type="radio" class="validate" name ="genre[]" value="F">
         <span>F</span>
           </label>

      </div>
      </div>
      <br/>
      </br>
    <div class="row">
      <div class="input-field col s6">
        </br>
      <textarea id="infos" name="infos[]"  class="materialize-textarea">
      </textarea>
        <label for="infos">Informations particulières </label></br>
      </div>
    </div>
END;

function formValide(){
  foreach ($_POST as $key => $value) {
    if ( $key!="Photo" &&  $key!="Infos_générales") { //facultatif dans le formulaire
      if($value == ''){
      return false;}
    }
  }
  return true;
}

if(formValide() && $_POST["Nombre_d'enfants"]>0){
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
  $nombreEnfants = $_POST["Nombre_d'enfants"];
  debutFormEnfants();
  for ($i=0; $i <$nombreEnfants ; $i++) {
    echo("<h3> Enfant ". ($i+1)."</h3>");
    global $formEnfants;
    echo $formEnfants;
    echo('<hr/><br/>  </br>');
  }
  finFormEnfants();
} else {
  readfile("./ParentsForm.html");

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
