<?php require_once('header.php');

$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'football_projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);

$query = $_GET['search'];

$sql_hazai = "SELECT * FROM eredmenyek WHERE `hazai` LIKE '%$query%' OR `idegen` LIKE '%$query%'";
$result = mysqli_query($connection, $sql_hazai);


?>

<div class="container">
    <br /><br />
    <form action="eredmenykereso.php" method="GET">
        <div class="row">
            <div>
                <p><b>Keresés hazai csapatnév alapján</b></p>
                <div class="col-sm-4">
                    <input type="text" name="search" id="search" placeholder="Keresés...">
                    <button type="submit" id="kereses" name="kereses" class="btn btn-dark btn-sm">Keresés</button>
                </div>
            </div>
        </div>
        <br>
    </form>
    <form action="eredmenyek.php">
        <button type="submit" id="vissza" name="vissza" class="btn btn-dark btn-sm">Vissza a teljes táblázatra</button>
    </form>
    <br>
    
    <div class="table-responsive">
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

                while ($row = mysqli_fetch_assoc($result)) {
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