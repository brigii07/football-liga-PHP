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


  <?php
  if ($_SESSION['user']['admin'] == 1) {
    $sql = $connection->query('SELECT * FROM csapat_parositas WHERE idopont IS NULL');

    echo '<div class="kartya">
      <div class="card mb-4">
         <div class="card-body text-center">
   <h5 class="my-3">Lejátszásra váró meccsek</h5>
   <div class="d-flex justify-content-center mb-2">
                           </div>
                           <hr>
                           <div class="row">  
          <div class="col-sm-12">
          <form method="POST" action="meccs_menete.php">
              <select name="meccs_id" id="meccs_id">';

    while ($row = mysqli_fetch_assoc($sql)) {

      $parositas = $row['hazai_csapat']. " - ". $row["idegen_csapat"];
      echo '
              <option value="' . $row['id'] . '">' . $parositas . '</option>
             ';
    }
    echo ' </select>
    </div>
    
        </div>
  <hr>
    <button class="btn btn-dark" type="submit" id="submit" name="submit">Meccs lejátszása</button>
    </form>
    </div>
        </div>
       </div>';
  }
  ?>
  </select>

  <div class="vertical"></div>
</div>



<div class="vl"></div>

<!-- Kész -->
<?php require_once('footer.php') ?>