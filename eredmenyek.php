<?php require_once('header.php') ?>
<?php

$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'football_projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);



$sql_query = 'SELECT * FROM eredmenyek';
$result = mysqli_query($connection, $sql_query);

?>
<br>

<section style="background-color: #838996;">
    <div class="container" style="margin-top: 10px;">
        <div>
            <form action="eredmenykereso.php" method="GET">
                <input type="text" name="query" id="query" placeholder="Keresés...">
                <button type="submit" id="kereso" name="kereso" class="btn btn-dark btn-sm">Keresés</button>
            </form>
        </div>
        <br>
        <div class="row" style="min-height: 100vh; ">
            <div class="col-12">
                <table class="table table-bordered table-hover table-dark text-center">
                    <thead>
                        <tr>
                            <th scope="col">Hazai Csapat</th>
                            <th scope="col">Vendég Csapat</th>
                            <th scope="col">Végeredmény</th>
                            <th scope="col">Időpont</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $connection->query('SELECT * FROM eredmenyek');

                        while ($row = $sql->fetch_array()) {
                            echo '<tr class="table-light">
                                <th scope="row">' . $row['hazai'] . '</th>
                                <th scope="row">' . $row['idegen'] . '</th>
                                <th scope="row">' . $row['vegeredmeny'] . '</th>
                                <th scope="row">' . $row['idopont'] . '</th>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>

        <?php require_once('footer.php') ?>