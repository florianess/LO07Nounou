<?php

require_once 'connection.php';

$regText = "/^([a-zA-Z]|\s|[àäéèêëëïîôöù-])*$/";


//Filtres pour les valeurs envoyées par l'utilisateur
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
  "password" => FILTER_DEFAULT
);

//filtrer les valeurs
$myinputs = filter_input_array(INPUT_POST, $filters);
$values = array_values($myinputs);

if(in_array(false, $values)) {
  header('Location: ../forms/ParentsForm.html');
} else {
  //verifie si l'email n'est pas deja utilisé
  $sql0 = "SELECT * FROM utilisateur WHERE email = '".$_POST["email"]."'";

  $test = $conn->query($sql0);

  if ($test->num_rows == 0){
    $presentation = str_replace ("'","''",$_POST['presentation']);
    $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $sql = "INSERT INTO utilisateur
        (nom, prenom, ville, email, portable, photo, presentation, type_user, password)
      VALUES ('$values[0]',
      '$values[1]',
      '$values[2]',
      '$values[3]',
      '$values[4]',
      '".$photo."',
      '$presentation',
      'parent',
      '".password_hash($values[7], PASSWORD_DEFAULT)."')"; //hash le password
    if (!$conn->query($sql)) {
      echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
  } else {
    echo 'email deja utilisé';
  }
}
$conn->close();
?>
