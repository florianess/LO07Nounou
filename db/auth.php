<?php
require_once "connection.php";

$sql = "SELECT * FROM utilisateur WHERE email = '".$_POST["email"]."'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
  $rows = $result->fetch_assoc();
  if (password_verify($_POST['password'], $rows['password'])) {
    switch ($rows['type_user']) {
      case 'admin':
        header('Location: ..\accueil\admin.html');
        break;
      case 'nounou':
        header('Location: ..\accueil\nounou.html');
        break;
      case 'parent':
        header('Location: ..\accueil\parent.html');
        break;
      default:
        header('Location: ../index.html');
        break;
    }
  } else {
    header('Location: ../index.html');
  }
}

?>
