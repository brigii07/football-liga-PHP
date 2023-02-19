<?php require_once('header.php') ?>
<?php

$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'football_projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);



$sql_query = 'SELECT * FROM csapatok';
$result = mysqli_query($connection, $sql_query);

?>
<style>
  .vl {
    border-left: 95px solid #212529;
    border-right: 95px solid #212529;
    height: 341px;
  }
</style>
<div class="vl">
  <br>
  <table class="table table-bordered table-dark text-center">
    <thead>
      <tr>
        <th scope="col">Meccs</th>
        <th scope="col">Időpont</th>
        <th scope="col">Oddsok (szorzó)</th>
      </tr>
    </thead>
    <tbody>
      <tr class="table-light">
        <th scope="row">Fradi - Honvéd</th>
        <th scope="row">2023.02.19</th>
        <th scope="row">1, 1.7 X 4.01 2, 3.02</th>
      </tr>
    </tbody>
  </table>
</div>

<div class="vl"></div>


<?php require_once('footer.php') ?>