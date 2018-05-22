<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>Administration</title>
</head>
<body>
  <div class="container">
    <h1> Administration de Nounou Finder </h1>

<?php

session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['type_user'] != 'admin') {
  echo "<h1 class='red-text'>Accees refusé</h1>";
} else {
  require_once '../modules/candidats.php';
}

?>
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</body>
</html>
