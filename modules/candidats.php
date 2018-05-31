<?php

require_once '../db/newNounous.php';
require_once '../db/connection.php';

if (isset($_GET['type'])) {
  switch ($_GET['type']) {
    case 'add':
      $sql = "UPDATE utilisateur SET type_user='nounou' WHERE email='".$_GET['email']."'";
      $conn->query($sql);
      header('Location: ..\accueil\listes.php?candidats');
      break;
    case 'remove':
      $sql = "DELETE FROM utilisateur_has_langue WHERE utilisateur_email='".$_GET['email']."';";
      $sql .= "DELETE FROM utilisateur WHERE email='".$_GET['email']."'";
      $conn->multi_query($sql);
      header('Location: ..\accueil\listes.php?candidats');
      break;
  }
} ?>

<div class='divider'></div>
<div class='section'>
<h3>Nouveau(x) Candidat(s)</h3>
<p><?php echo $nounous->num_rows; ?> Nounou(s) à valider </p>

<?php if ($nounous->num_rows > 0){ ?>

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
        <th>Valider</th>
    </tr>
  </thead>
  <tbody>

  <?php while ($row = $nounous->fetch_row()) {
    echo "<tr>";
      foreach ($row as $value) {
        echo "<td>".$value."</td>";
      }
    echo "<td>" ?>
    <a style='cursor:pointer;' href='listes.php?type=add&email=<?php echo $row[3] ?>'><i class='small material-icons green-text'>check</i></a>
    <a style='cursor:pointer;' href='listes.php?type=remove&email=<?php echo $row[3] ?>'><i class='small material-icons red-text'>close</i></a>
    </td>
  <?php
    echo "</tr>";
    }
  echo "</tbody></table>";
}
echo "</div>";
?>
