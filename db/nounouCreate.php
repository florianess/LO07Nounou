<?php

require_once 'connection.php';

$regText = "/^([a-zA-Z]|\s)*$/";

$filters = array(
  "nom" => array("filter"=>FILTER_VALIDATE_REGEXP,
                 "options"=>array("regexp"=> $regText)),
  "prenom" => array("filter"=>FILTER_VALIDATE_REGEXP,
                    "options"=>array("regexp"=> $regText)),
  "ville" => array("filter"=>FILTER_VALIDATE_REGEXP,
                   "options"=>array("regexp"=> $regText)),
  "email" => FILTER_VALIDATE_EMAIL,
  "portable" => array("filter"=>FILTER_VALIDATE_REGEXP,
                      "options"=>array("regexp"=>"/^0\d{9}$/")),
  "age" => array("filter"=>FILTER_VALIDATE_INT,
                "options"=>array("min_range"=>16,"max_range"=>60)),
  "experience" => array("filter"=>FILTER_VALIDATE_REGEXP,
                    "options"=>array("regexp"=> $regText)),
  "presentation" => array("filter"=>FILTER_VALIDATE_REGEXP,
                   "options"=>array("regexp"=> $regText)),

);

$myinputs = filter_input_array(INPUT_POST, $filters);
$values = array_values($myinputs);


if(in_array(false, $values)) {
  echo "ERREUR FORM";
} else {
  $sql0 = "SELECT * FROM utilisateur WHERE email = '".$_POST["email"]."'";

  $test = $conn->query($sql0);

  if ($test->num_rows == 0){
    $sql = "INSERT INTO utilisateur
    (nom, prenom, ville, email, portable,photo, age, experience, presentation, type_user, password)
    VALUES ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['ville']."','".$_POST['email']."','".$_POST['portable']."','".$_FILES['photo']['tmp_name']."','".$_POST['age']."','".$_POST['experience']."','".$_POST['presentation']."','await','".password_hash($_POST["password"], PASSWORD_DEFAULT)."')";
    if ($conn->query($sql)) {
      $debutSql = "INSERT INTO utilisateur_has_langue (utilisateur_email, langue_id) VALUES ('" . $_POST['email'] . "','";
      foreach ($_POST['langues'] as $value) {
        $sql3 = $debutSql . $value . "')";
        if ($conn->query($sql3)) {
          $conn->close();
          header('Location: ../?status=create');
        } else {
          echo "Error: " . $sql3 . "<br>" . $conn->error . "<br>";
        }
      }
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
  } else {
    echo 'email deja utilisé';
  }
}

?>
