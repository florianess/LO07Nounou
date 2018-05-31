<?php

require_once '../db/nounouInscrite.php';
require_once '../db/connection.php';

 ?>

<div class='divider'></div>
<div class='section'>
<h3>Liste des revenus par nounou</h3>
<p><?php echo $nounousInscrites->num_rows; ?> Nounou(s) incrite(s) </p>
<p><?php echo $nounousBlock->num_rows; ?> Nounou(s) bloquée(s) </p>


<?php if ($nounousInscrites->num_rows > 0 ||  $nounousBlock->num_rows>0 ){ ?>

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
        <th>Revenu (€)</th>

    </tr>
  </thead>
  <tbody>

  <?php

  $sqlNounou = "SELECT u.nom, u.prenom,u.ville, g.nounou_email, u.portable,u.age,u.experience, SUM(g.tarif) revenu
FROM garde g
INNER JOIN utilisateur u ON g.nounou_email = u.email
GROUP BY g.nounou_email
ORDER BY revenu DESC";



  $nounou= $conn->query($sqlNounou);
  while ( $rowNounou = $nounou->fetch_row())
 {
    echo "<tr>";
      foreach ($rowNounou as $value) {
        echo "<td>".$value."</td>";
      }

    echo "</tr>";
    }
  echo "</tbody></table>";
}
echo "</div>";
?>
