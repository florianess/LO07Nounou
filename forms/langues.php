<?php

require_once '../db/connection.php';

$sql = "SELECT * FROM langue";
$res = $conn->query($sql);

echo "<select multiple name ='langues[]' class='select'>
<option value='' disabled selected>Choix des langues</option>";

while ($row = $res->fetch_row()) {
    echo "<option value=$row[0]>$row[1]</option>";
}

echo "</select>
<label>Langues parlées</label>";

?>