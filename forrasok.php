<?php require_once('header.php') ?>
<?php

$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'football_projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);



$sql_query = 'SELECT * FROM forrasok';
$result = mysqli_query($connection, $sql_query);

?>

<br>

<section style="background-color: #838996;">
    <div class="container" style="margin-top: 10px;">
        <div class="row" style="min-height: 100vh; ">
            <div class="col-12">
                <h5>Csapatokhoz tartozó forrásaim:</h5>
                <table class="table table-bordered table-hover table-dark text-center">
                    <thead>
                        <tr>
                            <th scope="col">Csapatok</th>
                            <th scope="col">Eredmények</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $connection->query('SELECT * FROM forrasok');

                        while ($row = $sql->fetch_array()) {
                            echo '<tr class="table-light">
                                <th scope="row">' . $row['csapat'] . '</th>
                                <th scope="row">' . $row['eredmeny'] . '</th>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <br>
                <h5>Képekhez és információkhoz tartozó forrásaim:</h5>
                <table class="table table-bordered table-hover table-dark text-center">
                    <thead>
                        <tr>
                            <th scope="col">Képek</th>
                            <th scope="col">Információk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $connection->query('SELECT * FROM informacios_forrasok');

                        while ($row = $sql->fetch_array()) {
                            echo '<tr class="table-light">
                                <th scope="row">' . $row['kepek'] . '</th>
                                <th scope="row">' . $row['informaciok'] . '</th>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                Ez még töltődik
            </div>
        </div>


        <?php require_once('footer.php') ?>