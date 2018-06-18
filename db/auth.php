<?php
require_once "connection.php";

$sql = "SELECT * FROM utilisateur WHERE email = '".$_POST["email"]."'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $rows = $result->fetch_assoc();
  //vérifie si le mdp correspond
  if (password_verify($_POST['password'], $rows['password'])) {
    session_start();
    $_SESSION['user'] = $rows;
    // redirige selon le type d'utilisateur
    switch ($rows['type_user']) {
      case 'admin':
        header('Location: ..\accueil\admin.php');
        break;
      case 'nounou':
        header('Location: ..\accueil\nounou.php');
        break;
      case 'parent':
        header('Location: ..\accueil\parent.php');
        break;
      case 'await':
        header('Location: ..\?status=await');
        break;
      default:
        header('Location: ..');
        break;
    }
  } else {
    //renvoie sur la page d'accueil avec une erreur de mdp
    header('Location: ..\?status=errorpw');
  }
} else {
  //renvoie sur la page d'accueil avec une erreur globale
  header('Location: ..\?status=error');
}

$conn->close();

?>
