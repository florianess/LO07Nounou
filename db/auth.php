<?php
require_once "connection.php";

$sql = "SELECT * FROM utilisateur WHERE email = '".$_POST["email"]."'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $rows = $result->fetch_assoc();
  if (password_verify($_POST['password'], $rows['password'])) {
    session_start();
    $_SESSION['user'] = $rows;
    switch ($rows['type_user']) {
      case 'admin':
        header('Location: ..\accueil\admin.php');
        break;
      case 'nounou':
        header('Location: ..\accueil\nounou.html');
        break;
      case 'parent':
        header('Location: ..\accueil\parent.html');
        break;
      case 'await':
        header('Location: ..\?status=await');
        break;
      default:
        header('Location: ..');
        break;
    }
  } else {
    header('Location: ..\?status=errorpw');
  }
} else {
  header('Location: ..\?status=error');
}

$conn->close();

?>
