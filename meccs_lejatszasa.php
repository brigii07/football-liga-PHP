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
  }

  .kartya {
    margin-top: 10px;
    position: absolute;
    left: 175px;
    width: 480px;
  }

  .kartya2 {
    position: absolute;
    right: 105px;
    width: 300px;
  }

</style>


<div class="vl">

<!-- <label for="vendeg_cs" class="label1">Add meg a vendég csapat nevét:</label>
    <select name="vendeg_cs" id="vendeg_cs" class="input1"> -->
<!--     <?php
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
    </select> -->



<?php
  if ($_SESSION['user']['admin'] == 1) {
    $sql = $connection->query('SELECT * FROM csapat_parositas');
    echo '<div class="kartya">
                    <div class="card mb-4">
                       <div class="card-body text-center">
                 <h5 class="my-3">Fogadásra alkalmassá tett meccsek</h5>
                 <div class="d-flex justify-content-center mb-2">
                                         </div>';

    while ($row = $sql->fetch_array()) {
      echo '
        <hr>        
          <div class="row">

              <div class="col-sm-6">
                 <p class="mb-0">' . $row['hazai_cs'] . '</p>
              </div>
              <div class="col-sm-6">
                 <p class="mb-0">' . $row['idegen_cs'] . '</p>
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