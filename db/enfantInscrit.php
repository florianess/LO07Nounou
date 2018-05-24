<?php

require_once 'connection.php';

$sql = "SELECT `enfant_id`, `nom`, `prenom`, `age`, `info`, `email_parent` FROM `enfant`";
$enfantsInscrits = $conn->query($sql);

?>
