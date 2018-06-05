<div class="row center">
  <div class="input-field col s3">
      <input id="date" type="text" class="datepicker">
      <label for="date">Date</label>
  </div>
  <div class="input-field col s3">
    <input id="debut" type="text" class="timepicker">
    <label for="debut">Debut</label>
  </div>
  <div class="input-field col s3">
    <input id="fin" type="text" class="timepicker">
    <label for="fin">Fin</label>
  </div>
  <div class="col s3">
    <a style='cursor:pointer;' href=''><i class="material-icons">search</i></a>
  </div>
</div>
<hr>
      <div class="row">
<?php
require_once '../db/connection.php';
if(isset($_GET['type']) && $_GET['type'] == 'search') {

} else {
  $sql = "SELECT * FROM utilisateur WHERE type_user='nounou'";
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

    <div class="col s6 m4">
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
        </div>
      </div>
    </div>

      <?php
    }
  }
}
?>
</div>
