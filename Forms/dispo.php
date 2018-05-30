<?php

$page0 = <<<END
<form class="center" method="post" action="">
  <label>
    <input name="dispo" type="radio" value="work"/>
    <span>Tous les jours travaillés (Lu, Ma, Me, Je, Ve)</span>
  </label>
  <br><br>
  <label>
    <input name="dispo" type="radio" value="all"/>
    <span>Tous les jours (Lu, Ma, Me, Je, Ve, Sa, Di)</span>
  </label>
  <br><br>
  <label>
    <input name="dispo" type="radio" value="ponct" />
    <span>Ponctuellement certains jours de la semaine</span>
  </label>
  <br><br>
  <label>
    <input name="dispo" type="radio" value="some" />
    <span>Certains jours spécifiques</span>
  </label>
  <br><br>
  <button class="btn-large waves-effect waves-light" type="submit" name="page" value="1">Suivant
    <i class="material-icons right">arrow_forward</i>
  </button>
</form>
END;

$page1 = <<<END
<form class="center" method="post" action="">
    <select multiple name ="jours[]" class="select">
      <option value="" disabled selected>Choix des jours</option>
      <option value="1">Lundi</option>
      <option value="2">Mardi</option>
      <option value="3">Mercredi</option>
      <option value="4">Jeudi</option>
      <option value="5">Vendredi</option>
      <option value="6">Samedi</option>
      <option value="7">Dimanche</option>
    </select>
    <label>Journées</label>
  <br><br>
  <div class="row">
    <div class="input-field col s6">
      <button class="btn-large waves-effect waves-light right" type="submit"  name="page" value="0">Retour
        <i class="material-icons left">arrow_back</i>
      </button>
    </div>
    <div class="input-field col s6">
      <button class="btn-large waves-effect waves-light left" type="submit"  name="page" value="2">Suivant
        <i class="material-icons right">arrow_forward</i>
      </button>
    </div>
  </div>
</form>
END;

$page2 = <<<END
<form class="center" method="post" action="">
  <div id="add" class="row">
    <div class="input-field col s4">
      <label>Date :</label>
      <input type="text" class="datepicker" name="date[]">
    </div>
    <div class="input-field col s4">
      <label>De :</label>
      <input type="text" class="timepicker" name="debut[]">
    </div>
    <div class="input-field col s4">
      <label>A :</label>
      <input type="text" class="timepicker" name="fin[]">
    </div>
  </div>
  <br><br>
  <a class="btn-floating btn-large waves-effect waves-light" onclick="add()"><i class="material-icons">add</i></a>
  <br><br>
  <div class="row">
    <div class="input-field col s6">
      <button class="btn-large waves-effect waves-light right" type="submit"  name="page" value="1">Retour
        <i class="material-icons left">arrow_back</i>
      </button>
    </div>
    <div class="input-field col s6">
      <button class="btn-large waves-effect waves-light left" type="submit"  name="page" value="3">Suivant
        <i class="material-icons right">arrow_forward</i>
      </button>
    </div>
  </div>
</form>
END;

$page3 = <<<END
<form class="center" method="post" action="">
  <label>
    <input name="day" type="radio" value="same"/>
    <span>Horaires fixe</span>
  </label>
  <br><br>
  <label>
    <input name="day" type="radio" value="diff"/>
    <span>Horaires par journée</span>
  </label>
  <br><br>
  <div class="row">
    <div class="input-field col s6">
      <button class="btn-large waves-effect waves-light right" type="submit"  name="page" value="2">Retour
        <i class="material-icons left">arrow_back</i>
      </button>
    </div>
    <div class="input-field col s6">
      <button class="btn-large waves-effect waves-light left" type="submit"  name="page" value="4">Suivant
        <i class="material-icons right">arrow_forward</i>
      </button>
    </div>
  </div>
</form>
END;
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Disponibilités</title>
</head>
<body>
  <div class="container">
    <h1 class="center"> Enregistrez vos disponibilités</h1>
    <br>
    <br>
    <?php
    if (!isset($_POST['page'])) {
      echo $page0;
    } else {
      $indexPage = $_POST['page'];
      switch ($indexPage) {
        case '0':
          echo $page0;
          break;
        case '1':
          echo $page1;
          break;
        case '2':
          echo $page2;
          break;
        case '3':
          echo $page3;
          break;
        default:
          echo $page0;
          break;
      }
    }
    ?>


  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script type="text/javascript" src="../js/dispo.js"></script>
</body>
</html>
