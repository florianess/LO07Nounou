<form method="get" action="">
  <div class="row center">
    <div class="input-field col s3">
        <input id="date"
        <?php if (isset($_GET['date']) && $_GET['date'] !== "") {
          echo "placeholder=".$_GET['date'];
        }?>
        type="text" class="datepicker" name="date">
        <label for="date">Date</label>
    </div>
    <div class="input-field col s3">
      <input id="debut"
      <?php if (isset($_GET['debut']) && $_GET['debut'] !== "") {
        echo "placeholder=". $_GET['debut'];
      }?>
      type="text" class="timepicker" name="debut">
      <label for="debut">Debut</label>
    </div>
    <div class="input-field col s3">
      <input id="fin"
      <?php if (isset($_GET['fin']) && $_GET['fin'] !== "") {
        echo "placeholder=". $_GET['fin'];
      }?>
      type="text" class="timepicker" name="fin">
      <label for="fin">Fin</label>
    </div>
    <div class="input-field col s3">
      <button class="btn waves-effect waves-light left pink lighten-1" type="submit"><i class="material-icons">search</i></button>
    </div>
  </div>
</form>
<hr>
      <div class="row">
<?php

require_once '../db/connection.php';

if (isset($_GET['date'])) {
  if($_GET['date'] != '' && $_GET['debut'] == '' && $_GET['fin'] == '') {
    $jour = $_GET['date'];
    $conv = DateTime::createFromFormat('d/m/Y', $jour);
    $numJ = date("N",$conv->format('U'));
    if ($numJ == 7) {$numJ = 0;};
    $sql = "SELECT * FROM dispo INNER JOIN utilisateur u ON dispo.nounou_email = u.email WHERE jour = '$jour' OR jour = '$numJ'";
  } else if($_GET['date'] != '' && $_GET['debut'] != '' && $_GET['fin'] != '') {
    $jour = $_GET['date'];
    $conv = DateTime::createFromFormat('d/m/Y', $jour);
    $numJ = date("N",$conv->format('U'));
    if ($numJ == 7) {$numJ = 0;};
    $debut = $_GET['debut'].':00';
    $fin = $_GET['fin'].':00';
    if ($fin == '00:00:00') {$fin = '23:59:59';};
    $sql = "SELECT * FROM dispo INNER JOIN utilisateur u ON dispo.nounou_email = u.email WHERE (jour = '$jour' OR jour = '$numJ') AND debut <= '$debut' AND fin >= '$fin'";
  }
} else {
  $sql = "SELECT * FROM utilisateur WHERE type_user='nounou'";
}
$res = $conn->query($sql);
if($res) {

  while ($row = $res->fetch_assoc()) {
    $email = $row['email'];
    $sql2 = "SELECT * FROM utilisateur_has_langue ul INNER JOIN langue l ON ul.langue_id = l.langue_id WHERE utilisateur_email = '$email'";
    $res2 = $conn->query($sql2)->fetch_all();
    $langues = '';
    for ($i=0; $i < count($res2); $i++) {
      $langues .= $res2[$i][3] . ' ';
    };
    ?>

  <div class="col s6 m4 l3">
    <div class="card">
      <div class="card-content pink-text">
        <span class="card-title"><i class="material-icons">account_box</i><?php echo $row["prenom"] ?></span>
        <p>Ville: <?php echo $row['ville']?></p>
        <p>Expérience: <?php echo $row['experience']?></p>
        <p>Présentation: <?php echo $row['presentation']?></p>
        <p>Langues: <?php echo $langues?></p>
      </div>
      <div class="card-action">
        <a href="#">Réserver</a>
        <a href="../modules/profilnounou.php?email=<?php echo $row['email'] ?>" class="right">Profil</a>
      </div>
    </div>
  </div>

    <?php
  }
}
?>
</div>
