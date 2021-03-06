<div>
<form method="get" action="">
  <div class="row center">
    <div class="input-field col s3">
        <input id="date"
        <?php if (isset($_GET['date']) && $_GET['date'] !== "") {
          echo "value=".$_GET['date'];
        }?>
        type="text" class="datepicker" name="date">
        <label for="date">Date</label>
    </div>
    <div class="input-field col s3">
      <input id="debut"
      <?php if (isset($_GET['debut']) && $_GET['debut'] !== "") {
        echo "value=". $_GET['debut'];
      }?>
      type="text" class="timepicker" name="debut">
      <label for="debut">Debut</label>
    </div>
    <div class="input-field col s3">
      <input id="fin"
      <?php if (isset($_GET['fin']) && $_GET['fin'] !== "") {
        echo "value=". $_GET['fin'];
      }?>
      type="text" class="timepicker" name="fin">
      <label for="fin">Fin</label>
    </div>
    <div class="input-field col s3">
      <button class="btn waves-effect waves-light left pink lighten-1" type="submit"><i class="material-icons">search</i></button>
    </div>
  </div>
  <div class="row center">
    <div class="input-field col s3">
      <select multiple name ="enfants[]">
        <?php
          require_once '../db/connection.php';
          session_start();
          $sqlE = "SELECT * FROM enfant WHERE email_parent = '". $_SESSION['user']['email']."'";
          $resE = $conn->query($sqlE);
          while($enf = $resE->fetch_row()){
            echo "<option value=$enf[0]>$enf[2]</option>";
          }
        ?>
      </select>
      <label>Enfants</label>
      </div>
      <div class="input-field col s3">
        <select name="type">
          <option value="occ">Occasionnelle</option>
          <option value="reg">Régulière</option>
        </select>
        <label for="debut">Type de garde</label>
      </div>
      <div class="input-field col s3">
          <select name ='langue' class='select'>
            <option value='' disabled selected>Choix d'une langue</option>
            <?php require_once '../forms/langues.php'?>
          </select>
          <label>Langue étrangère (optionnel)</label>
      </div>
    </div>
  </div>
</form>
<hr>
<div class="row">
<?php
if (isset($_GET['date'])) {
  $sql = "SELECT * FROM dispo
          INNER JOIN utilisateur u ON dispo.nounou_email = u.email";
  if (isset($_GET['langue'])) {
    $sql .= " INNER JOIN utilisateur_has_langue ul on u.email = ul.utilisateur_email";
  }
  $sql .= " WHERE";
  $jour = $_GET['date'];
  $conv = DateTime::createFromFormat('d/m/Y', $jour);
  $numJ = date("N",$conv->format('U'));
  if ($numJ == 7) {$numJ = 0;};
  if($_GET['date'] != '' && $_GET['debut'] != '' && $_GET['fin'] != '') {
    $debut = $_GET['debut'].':00';
    $fin = $_GET['fin'].':00';
    if ($fin == '00:00:00') {$fin = '23:59:59';};
    $sql .=" dispo.debut <= '$debut' AND dispo.fin >= '$fin'";
  }
  if ($_GET['type'] == 'reg') {
    $sql.=" AND dispo.jour = '$numJ'";
    $tjour = $numJ;
  } else {
    $sql.=" AND (dispo.jour = '$jour' OR dispo.jour = '$numJ')";
    $tjour =$jour;
  }
  if (isset($_GET['langue'])) {
    $sql .= " AND ul.langue_id = '".$_GET['langue']."'";
  }
  $resa = array('enfants' => $_GET['enfants'], 'debut' => $_GET['debut'], 'fin' => $_GET['fin'], 'jour' => $tjour, 'email_parent' => $_SESSION['user']['email']);
  $_SESSION['resa']=$resa;
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
    if (isset($_GET['date'])){
      $dateUS = $conv->format('Y-m-d');
      $sql3 = "SELECT * FROM garde WHERE nounou_email = '$email'
              AND (((debut BETWEEN '$numJ $debut' AND '$numJ $fin') AND (fin BETWEEN '$numJ $debut' AND '$numJ $fin'))
                OR ((debut BETWEEN '$dateUS $debut' AND '$dateUS $fin') AND (fin BETWEEN '$dateUS $debut' AND '$dateUS $fin')))";
      $res3 = $conn->query($sql3);
    }
    if (!isset($_GET['date']) || $res3->num_rows == 0){
      ?>

  <div class="col s12 m4">
    <div class="card small hoverable">
      <div class="card-content pink-text">
        <span class="card-title"><img src="data:image/jpeg;base64,<?php echo base64_encode( $row['photo'] )?>" width="50"/>   <?php echo $row["prenom"] ?></span>
        <p>Ville: <?php echo $row['ville']?></p>
        <p>Expérience: <?php echo $row['experience']?></p>
        <p>Présentation: <?php echo $row['presentation']?></p>
        <p>Langues: <?php echo $langues?></p>
      </div>
      <div class="card-action">
        <a href="../db/reservation.php?email=<?php echo $row['email'] ?>">Réserver</a>
        <a href="../modules/profilnounou.php?email=<?php echo $row['email'] ?>" class="right">Profil</a>
      </div>
    </div>
  </div>

    <?php
    }
  }
}
?>
</div>
</div>
