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
    position: absolute;
    left: 50%;
  }

  .kartya {
    position: absolute;
    left: 105px;
    width: 300px;
  }

  .kartya1 {
    position: absolute;
    left: 450px;
    width: 300px;
  }

  .kartya2 {
    position: absolute;
    right: 105px;
    width: 300px;
  }

  .kartya3 {
    position: absolute;
    right: 450px;
    width: 300px;
  }
</style>

<div class="vl">
  <div class="container">
    <div class="card kartya" style="width: 18rem; margin-top:10px;">
      <div class="card-body">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
          echo '
        <p class="card-text" style="margin-top:5px;">' . $row['hazai_cs'] . ' VS ' .$row['idegen_cs']. '</p>
        <a href="#" class="btn btn-primary" style="margin-top:2px;">Go somewhere</a>';
        }
        ?>
      </div>
    </div>

    <div class="card kartya1" style="width: 18rem; margin-top:10px;">
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>


    <div class="vertical"></div>

    <div class="card kartya2" style="width: 18rem; margin-top:10px;">
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>

    <div class="card kartya3" style="width: 18rem; margin-top:10px;">
      <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>

<div class="vl"></div>



<?php require_once('footer.php') ?>