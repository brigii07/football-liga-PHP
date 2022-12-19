<?php require_once('header.php') ?>
<?php

$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);



$sql_query = 'SELECT * FROM csapatok';
$result = mysqli_query($connection, $sql_query);

?>




<?php require_once('footer.php') ?>