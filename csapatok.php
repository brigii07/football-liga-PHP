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

<section style="background-color: #838996;">
    <div class="container" style="margin-top: 10px;">

        <div class="row" style="min-height: 100vh; ">

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-3" style=" display: flex;">
                    
            <div class="card" style="margin-top:10px;width: 300px;height: 500px">
                <img src="images/' . $row['kepnev'] . '" class="card-img-top" alt="csapatok" style="padding:10px; height: 250px; width: 300px;">
                <div class="card-body">
                    <h5 class="card-title">' . $row['csapatnev'] . '</h5>
                    <p class="card-text">' . $row['csapatleiras'] . '</p>
                    
                </div>
            </div>
                        </div>';
            }

            ?>

        </div>
    </div>
</section>

<?php require_once('footer.php') ?>