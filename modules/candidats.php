<?php

require_once '../db/newNounous.php';

$text = "<div class='divider'></div>
        <div class='section'>
        <h3>Nouveau(x) Candidat(s)</h3>
        <p>".$nounous->num_rows." nounou(s) à valider </p>";

$text .= <<<END
  <table>
  <thead>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Ville</th>
        <th>Email</th>
        <th>Portable</th>
        <th>Age</th>
        <th>Experience</th>
        <th>Presentation</th>
    </tr>
  </thead>
  <tbody>
END;
if ($nounous->num_rows > 0){
  while ($row = $nounous->fetch_row()) {
    $text.= "<tr>";
      foreach ($row as $value) {
        $text.= "<td>".$value."</td>";
      }
    $text.= "</tr>";
    }
  $text .= "</tbody></table>";
}
$text.= "</div>";
?>
