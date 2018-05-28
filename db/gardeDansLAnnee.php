<?php

require_once 'connection.php';

$sql = "SELECT *FROM garde WHERE debut> '2018-01-01 00:00:00' AND fin<'2019-01-01 00:00:00'";
$sql1 = "SELECT *FROM garde WHERE debut> '2017-01-01 00:00:00' AND fin<'2018-01-01 00:00:00'";
$sql2= "SELECT *FROM garde WHERE debut> '2016-01-01 00:00:00' AND fin<'2017-01-01 00:00:00'";



$gardeannee = $conn->query($sql);
$gardeanneeDerniere = $conn->query($sql1);
$gardeannee2016 = $conn->query($sql2);

?>
