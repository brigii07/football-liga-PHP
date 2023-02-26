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




<div class="vertical"></div>
</div>



<div class="vl"></div>



<?php require_once('footer.php') ?>