<?php

require_once 'connection.php';

$regText = "/^([a-zA-Z]|\s|[àäéèêëëïîôöù])*$/";

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
  "password" => FILTER_DEFAULT
);

$myinputs = filter_input_array(INPUT_POST, $filters);
$values = array_values($myinputs);

if(in_array(false, $values)) {
  header('Location: ../forms/NounouForm.html?error');
} else {
  $sql0 = "SELECT * FROM utilisateur WHERE email = '".$_POST["email"]."'";

  $test = $conn->query($sql0);

  if ($test->num_rows == 0){
    var_dump($_FILES);
    $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $sql = "INSERT INTO utilisateur
    (nom, prenom, ville, email, portable, photo, age, experience, presentation, type_user, password)
    VALUES ('$values[0]',
      '$values[1]',
      '$values[2]',
      '$values[3]',
      '$values[4]',
      '".$photo."',
      '$values[5]',
      '$values[6]',
      '$values[7]',
      'await',
      '".password_hash($values[8], PASSWORD_DEFAULT)."')";
    if ($conn->query($sql)) {
      $debutSql = "INSERT INTO utilisateur_has_langue (utilisateur_email, langue_id) VALUES ('$values[3]','";
      foreach ($_POST['langues'] as $value) {
        $sql3 = $debutSql . $value . "')";
        if (!$conn->query($sql3)) {
          echo "Error: " . $sql3 . "<br>" . $conn->error . "<br>";
        }
      }
    //header('Location: ../?status=create');
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
  } else {
    echo 'email deja utilisé';
  }
}
?>
