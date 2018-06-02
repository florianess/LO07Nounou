<?php
require_once '../db/connection.php';

session_start();

$sqlDispo = "SELECT * FROM dispo WHERE nounou_email = '".$_SESSION['user']['email']."'";

$res = $conn->query($sqlDispo);
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
  <div class='container'>
    <h1 class='center'>Ton agenda</h1>
    <br><br><hr><br>
    <div id='calendar'></div>
  <div>
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
