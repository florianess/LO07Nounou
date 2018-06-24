<?php

require_once '../db/connection.php';

$sql = "SELECT * FROM langue";
$res = $conn->query($sql);

while ($row = $res->fetch_row()) {
    echo "<option value=$row[0]>$row[1]</option>";
}

?>