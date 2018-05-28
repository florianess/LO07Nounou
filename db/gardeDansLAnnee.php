<?php

require_once 'connection.php';

$sql = "SELECT *FROM garde WHERE debut> '2018-01-01 00:00:00' AND fin<'2019-01-01 00:00:00'";
$sql1 = "SELECT *FROM garde WHERE debut> '2017-01-01 00:00:00' AND fin<'2018-01-01 00:00:00'";


$gardeannee = $conn->query($sql);
$gardeanneeDerniere = $conn->query($sql1);

?>
