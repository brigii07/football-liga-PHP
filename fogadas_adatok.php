<?php require_once('header.php') ?>
<?php

$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'football_projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);

$sql_query = 'SELECT * FROM csapat_parositas';
$result = mysqli_query($connection, $sql_query);

?>
<style>
  .vl {
    border-left: 95px solid #212529;
    border-right: 95px solid #212529;
    height: 341px;
  }

  .vertical {
    border-left: 2px solid #212529;
    height: 682px;
    position: relative;
    left: 50%;
    max-width: 1%;
  }

  .kartya {
    margin-top: 10px;
    position: absolute;
    left: 105px;
    width: 600px;
  }

  .kartya2 {
    margin-top: 10px;
    position: absolute;
    right: 105px;
    width: 600px;
  }
</style>

<div class="vl">

  <?php

  /* Bal oldali oszlop a meccs adataival */
  if ($_SESSION['user']['admin'] == 0) {
    $sql = $connection->query('SELECT * FROM csapat_parositas');
    echo '<div class="kartya">
                    <div class="card mb-4">
                       <div class="card-body text-center">
                 <h5 class="my-3">Fogadásra alkalmas meccsek</h5>
                 <div class="d-flex justify-content-center mb-2">
                                         </div>';

    while ($row = $sql->fetch_array()) {
      echo '
                                            <hr>
                                                          
                                              <div class="row">
                                    
                                                  <div class="col-sm-4">
                                                     <p class="mb-0">' . $row['hazai_csapat'] . ' - ' . $row['idegen_csapat'] . ' </p>
                                                  </div>
                                                  <div class="col-sm-4">
                                                  <form method="POST" action="fogadas_adatok.php">
                                                      <input type="hidden" name="meccs" value = "' . $row['id'] . '">';

      if (isset($row['idopont'])) {
        echo '<button disabled class="btn btn-dark" type="submit" id="submit" name="submit">Fogadj erre</button>';
      } else {
        echo '<button class="btn btn-dark" type="submit" id="submit" name="submit">Fogadj erre</button>';
      }
      echo '</form>
                                                  </div>
                                                  <div class="col-sm-4">
                                                    <form method="POST" action="szimulalt_eredmenyek.php">
                                                      <input type="hidden" name="meccs" value = "' . $row['id'] . '">';
      if (isset($row['idopont'])) {
        echo '<button class="btn btn-dark" type="submit" id="submit" name="submit">Nézd meg</button>';
      } else {
        echo '<button disabled class="btn btn-dark" type="submit" id="submit" name="submit">Nézd meg</button>';
      }

      echo '</form>
                                                  </div>
                                              </div>
                                            <hr>';
    }
    echo ' </div>
        </div>
       </div>';
  }
  ?>

  <?php
  if ($_SESSION['user']['admin'] == 0) {
    $sql = $connection->query('SELECT * FROM csapat_parositas WHERE id="' . $_POST["meccs"] . '"');

    echo '<div class="kartya2"> <form method="POST" action="controllers/fogadas_leadas.php">
                    <div class="card mb-4">
                       <div class="card-body text-center">
                 <h5 class="my-3">A választott meccs adatai</h5>
                 <div class="d-flex justify-content-center mb-2">
                                         </div>';

    while ($row = $sql->fetch_array()) {
      echo '
        <hr>
                     
          <div class="row">
              <div class="col-sm-4">
              <p class="mb-0"> Hazai: ' . $row['hazai_sz'] . 'x</p>
              </div>
              <div class="col-sm-4">
              <p class="mb-0"> Döntetlen: ' . $row['dontetlen_sz'] . 'x</p>
              </div>
              <div class="col-sm-4">
              <p class="mb-0"> Idegen: ' . $row['idegen_sz'] . 'x</p>
              </div>
          </div>
        <hr>';
      echo '
        <div class="row">
        <div class="col-sm-4">
        
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="hazai" name="hazai" onchange="changeHandler(this)">
            <label for="hazai">Credit</label>
          </div>
        </div>
        <div class="col-sm-4">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="dontetlen" name="dontetlen" onchange="changeHandler(this)">
            <label for="dontetlen">Credit</label>
          </div>
        </div>
        <div class="col-sm-4">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="idegen" name="idegen" onchange="changeHandler(this)">
            <label for="idegen">Credit</label>
          </div>
        </div>
        </div>
        ';
      echo '
        <div class="row">
        <div class="col-12 text-center">
        <input type="hidden" name="meccs" value = "' . $_POST['meccs'] . '">
        <button class="btn btn-dark" type="submit" id="submit" name="submit">Fogadás</button>
        </div>
        </form>
       </div>
        ';
    }
    echo ' </div>
        </div>
       </div>';
  }
  ?>

  <div class="vertical"></div>

</div>

<div class="vl">
</div>


<script>


  /* Néhány keretrendszernél (pl. React) más formában írva a funkciókat lefut a betöltéskor, ebben a formában nem. */
  let changeHandler = (input) => {
    let hazai = document.getElementById('hazai');
    let dontetlen = document.getElementById('dontetlen');
    let idegen = document.getElementById('idegen');

    if (input == hazai) {
      dontetlen.setAttribute('disabled', true);
      idegen.setAttribute('disabled', true);
    }

    if (input == dontetlen) {
      hazai.setAttribute('disabled', true);
      idegen.setAttribute('disabled', true);
    }

    if (input == idegen) {
      dontetlen.setAttribute('disabled', true);
      hazai.setAttribute('disabled', true);
    }

    if (input.value == null || input.value == "" || input.value == "0") {
      hazai.removeAttribute('disabled');
      dontetlen.removeAttribute('disabled');
      idegen.removeAttribute('disabled');
    }

  }
</script>



<?php require_once('footer.php') ?>