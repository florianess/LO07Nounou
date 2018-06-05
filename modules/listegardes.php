
<div class='container'>
<div class='divider'></div>
<div class='section'>
<h3>Liste des gardes proposées</h3>
<p><?php
echo "</br>";

require_once '../db/gardesParent.php';

echo '<h5><b>' .$gardesParent->num_rows. '</b>'; ?> Garde(s) proposée(s) :</h5> </p>
<br/>

<?php if ($gardesParent->num_rows > 0){ ?>

  <table>
  <thead>
    <tr>
        <th>Début</th>
        <th>Fin</th>

          <th>Rémunération (€)</th>
          <th>Statut</th><!-- "reservee" ou "evaluee"!-->


    </tr>
  </thead>
  <tbody>

  <?php while ($row = $gardesParent->fetch_row()) {

    if ($row[3]=="reservee") {
      echo "<tr>";
      for ($i=0; $i <3 ; $i++) {
      echo "<td>".$row[$i]."</td>";
      }
      echo "<td> Résevée par ";
      $sql = "SELECT nom, prenom  FROM utilisateur WHERE email = '$row[4]'";
      $nounou = $conn->query($sql);
      $row2= $nounou->fetch_row();
      echo "<a href='../modules/profilnounou.php?email=$row[4] '>  $row2[1] $row2[0] </a> </td>";

    }

    echo "</tr>";
    }
  echo "</tbody></table>";
}
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";
echo "</div>";
echo "</div>";
?>
