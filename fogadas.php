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
    width: 50%;
    position: relative;
    left: 50%;
  }

  .kartya {
    margin-top: 10px;
    position: absolute;
    left: 105px;
    width: 600px;
  }

  .kartya2 {
    position: absolute;
    right: 105px;
    width: 300px;
  }
</style>

<div class="vl">

<?php
  if ($_SESSION['user']['admin'] == 0) {
    $sql = $connection->query('SELECT * FROM csapat_parositas');
    $id = $_SESSION['user']['id'];

    $fogadasquery = $connection->query("SELECT * FROM fogadas WHERE felhasznaloid = '$id'");

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

      if (isset($row['idopont'])) { /* Ha már lejátszott meccs nem fogadhat de megnézheti */
        echo '<button disabled class="btn btn-dark" type="submit" id="submit" name="submit">Fogadj erre</button>';
      } else {
        echo '<button class="btn btn-dark" type="submit" id="submit" name="submit">Fogadj erre</button>';
      }
      echo '</form>
              </div>
              <div class="col-sm-4">
                <form method="POST" action="szimulalt_eredmenyek.php">
                  <input type="hidden" name="meccs" value = "' . $row['id'] . '">';
      if (isset($row['idopont'])) { /* Ha már lejátszott meccs megnézheti de nem fogadhat. */
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


<div class="vertical"></div>

</div>



<div class="vl"></div>



<?php require_once('footer.php') ?>