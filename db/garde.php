<?php

require_once 'connection.php';

$sql = "SELECT `garde_id`, `debut`, `fin`, `nounou_email`, `tarif` FROM `garde`";
$garde= $conn->query($sql);

?>
