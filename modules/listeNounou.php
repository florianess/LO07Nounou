<?php

require_once '../db/nounouInscrite.php';
require_once '../db/connection.php';

if (isset($_GET['type'])) {
  if ($_GET['type'] == 'block') {
    $sql = "UPDATE utilisateur SET type_user='block' WHERE email='".$_GET['email']."'";
    $conn->query($sql);
  }
  header('Location: ..\accueil\listes.php');
} ?>

<div class='divider'></div>
<div class='section'>
<h3>Liste des nounous inscrites</h3>
<p><?php echo $nounousInscrites->num_rows; ?> Nounou(s) incrite(s) </p>

<?php if ($nounousInscrites->num_rows > 0){ ?>

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
        <th>Bloquer</th>
        <th>Dossier complet</th>

    </tr>
  </thead>
  <tbody>

  <?php while ($row = $nounousInscrites->fetch_row()) {
    echo "<tr>";
      foreach ($row as $value) {
        echo "<td>".$value."</td>";
      }
    echo "<td class='center'>" ?>
    <a style='cursor:pointer;' href='listes.php?type=block&email=<?php echo $row[3] ?>'><i class='small material-icons red-text'>block</i></a>
    </td>
  <td class='center'>
    <a style='cursor:pointer;' href='..\modules\dossier.php?email=<?php echo $row[3] ?>'><i class='small material-icons blue-text'>link</i></a>
  </td>

  <?php
    echo "</tr>";
    }
  echo "</tbody></table>";
}
echo "</div>";
?>
