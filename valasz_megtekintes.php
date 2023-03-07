<?php require_once('header.php');
$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'football_projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);

$query = 'SELECT * FROM admin_valasz';
$result = mysqli_query($connection, $query);
?>

<section style="background-color: #838996;">
    <style>
        .vl {
            border-left: 95px solid #212529;
            border-right: 95px solid #212529;
            height: 341px;
        }

        .kartya2 {
            position: absolute;
            top: 485px;
            right: 218px;
            width: 150px;
        }
    </style>
    <div class="vl">
       

    
    </div>

    <div class="vl"></div>
    <?php require_once('footer.php') ?>