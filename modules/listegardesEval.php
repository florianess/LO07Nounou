<div class='container'>
<div class='divider'></div>
<div class='section'>
<h3>Liste des gardes à évaluer</h3>
<p><?php
echo "</br>";

require_once '../db/gardesParent.php';

echo '<h5><b>' .$gardesTerminee->num_rows. '</b>'; ?> Garde(s) à évaluer :</h5> </p>
<br/>

<?php if ($gardesTerminee->num_rows > 0){ ?>

  <table>
  <thead>
    <tr>
        <th>Début</th>
        <th>Fin</th>
          <th>Rémunération (€)</th>
          <th>Nounou</th>
          <th></th><!-- "reservee" ou "evaluee"!-->


    </tr>
  </thead>
  <tbody>

  <?php while ($row = $gardesTerminee->fetch_row()) {

      echo "<tr>";
      for ($i=0; $i <3 ; $i++) {
      echo "<td>".$row[$i]."</td>";}
      echo "<td>  ";
      $sql = "SELECT nom, prenom  FROM utilisateur WHERE email = '$row[4]'";
      $nounou = $conn->query($sql);
      $row2= $nounou->fetch_row();
        echo "<td><a href='../modules/noter.php?prenom=$row2[1]&nom=$row2[0]&nounouemail=$row[4]&gardeID=$row[5]'>Noter</a></td>";
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
