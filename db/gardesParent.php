<?php

require_once 'connection.php';

$date =date('Y-m-d H:i:s');
$sql = "SELECT debut, fin, tarif, status, nounou_email FROM garde WHERE email_parent='".$_SESSION['user']['email']."'"." AND fin >'$date'" ;
$gardesParent = $conn->query($sql);

?>
