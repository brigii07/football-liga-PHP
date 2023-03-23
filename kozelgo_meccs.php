<?php require_once('header.php') ?>

<style>
  .vl {
    border-left: 95px solid #212529;
    border-right: 95px solid #212529;
    height: 341px;
  }

  .label1 {
    position: absolute;
    right: 300px;
    width: 300px;
  }

  .input1 {
    position: absolute;
    right: 155px;
    width: 200px;
  }

  .label2 {
    position: absolute;
    left: 250px;
    width: 300px;
  }

  .input2 {
    position: absolute;
    left: 480px;
    width: 200px;
  }

  .hazai_label {
    position: absolute;
    left: 160px;
    width: 200px;
  }

  .hazai {
    position: absolute;
    left: 260px;
    width: 200px;
  }

  .idegen_label {
    position: absolute;
    right: 310px;
    width: 200px;
  }

  .idegen {
    position: absolute;
    right: 200px;
    width: 200px;
  }

  .dontetlen {
    position: absolute;
    right: 600px;
    width: 200px;
  }

  .dontetlen_label {
    position: absolute;
    right: 730px;
    width: 200px;
  }

  .gomb {
    position: absolute;
    right: 660px;
    width: 200px;
  }
</style>

<div class="vl">
  <br>
  <?php
    if (isset($_GET['success'])) {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Siker!</strong> A meccsek párosítása sikeres volt
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      ';
  } elseif (isset($_GET['ures'])) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Hiba!</strong> Minden adatot tölts ki.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  } elseif (isset($_GET['inic'])) {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Hiba!</strong> Az inicializálás nem működik.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
  elseif(isset($_GET['ketszer']))
  {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Hiba!</strong> Nem adhatod meg ugyanazt a csapatot kétszer.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
  elseif(isset($_GET['nemsikerult']))
  {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Hiba!</strong> A párosítás nem sikerült.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
    ?>
  <form method="POST" action="controllers/kozelgo.php">

    <label for="hazai_cs" class="label2">Add meg a hazai csapat nevét:</label>
    <select id="hazai_cs" name="hazai_cs" class="input2">
      <?php
      $serverAddress = 'localhost';
      $username = 'root';
      $password = '';
      $databaseName = 'football_projekt';

      $connection = mysqli_connect($serverAddress, $username, $password, $databaseName);

      $sql_query = 'SELECT * FROM csapatok';
      $result = mysqli_query($connection, $sql_query);

      while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['csapatnev'] . '">' . $row['csapatnev'] . '</option>';
        $hazaicsapat = $row['csapatnev'];
      }
      ?>
    </select>


    <label for="vendeg_cs" class="label1">Add meg a vendég csapat nevét:</label>
    <select name="vendeg_cs" id="vendeg_cs" class="input1">
      <?php
      $serverAddress = 'localhost';
      $username = 'root';
      $password = '';
      $databaseName = 'football_projekt';

      $connection = mysqli_connect($serverAddress, $username, $password, $databaseName);

      $sql_query = 'SELECT * FROM csapatok';
      $result = mysqli_query($connection, $sql_query);

      while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['csapatnev'] . '">' . $row['csapatnev'] . '</option>';
       $idegencsapat = $row['csapatnev'];
      }
      ?>
    </select>

    <br>
    <br>
    <hr>
    <br>
    <br>

    <label for="hazai_sz" class="hazai_label">Hazai szorzó: </label>
    <input type="text" id="hazai_sz" name="hazai_sz" class="hazai">

    <label for="dontetlen_sz" class="dontetlen_label">Döntetlen szorzó: </label>
    <input type="text" id="dontetlen_sz" name="dontetlen_sz" class="dontetlen">

    <label for="idegen_sz" class="idegen_label">Idegen szorzó: </label>
    <input type="text" id="idegen_sz" name="idegen_sz" class="idegen">

    <br>
    <br>
    <hr>
    <br>
    <br>
    
    <button class="btn btn-dark gomb" type="submit" id="submit" name="submit">Párosítás leadása</button>
  </form>

</div>

<div class="vl"></div>
<!-- Kész -->
<?php require_once('footer.php') ?>