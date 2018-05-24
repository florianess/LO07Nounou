<?php

require_once '../db/nounouBlock.php';
require_once '../db/connection.php';

if (isset($_GET['type'])) {
  if ($_GET['type'] == 'unlock') {
    $sql = "UPDATE utilisateur SET type_user='nounou' WHERE email='".$_GET['email']."'";
    $conn->query($sql);
  }
  header('Location: ..\accueil\listes.php');
} ?>

<div class='divider'></div>
<div class='section'>
<h3>Liste des nounous bloquées</h3>
<p><?php echo $nounousBlock->num_rows; ?> Nounou(s) bloquée(s) </p>

<?php if ($nounousBlock->num_rows > 0){ ?>

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
        <th>Débloquer</th>
    </tr>
  </thead>
  <tbody>

  <?php while ($row = $nounousBlock->fetch_row()) {
    echo "<tr>";
      foreach ($row as $value) {
        echo "<td>".$value."</td>";
      }
    echo "<td>" ?>
    <a style='cursor:pointer;' href='listes.php?type=unlock&email=<?php echo $row[3] ?>'><i class='small material-icons'>lock_open</i></a>
    </td>
  <?php
    echo "</tr>";
    }
  echo "</tbody></table>";
}
echo "</div>";
?>
