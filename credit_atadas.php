<?php require_once('header.php');

$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'football_projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);

$query = $_GET['szam'];
$sql_hazai = "SELECT kerdes FROM kredit_vetel WHERE id LIKE '%$query%'";
$result = mysqli_query($connection, $sql_hazai);

?>
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <br>
            <form action="controllers/credit_vetel.php" method="POST">
                <div class="card" style="width: 35rem;">
                    <div class="card-body">
                        <h5 class="card-title">Kérdés</h5>
                        <p class="card-text">
                            <?php while ($row = mysqli_fetch_assoc($result)) {
                                echo $row['kerdes'];
                            } ?>
                        </p>
                        <p><input type="text" class="form-control" name="valasz" id="valasz" placeholder="Válasz..." required></p>
                        <button type="submit" id="submit" name="submit" class="btn btn-dark">Credit igénylése</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>

</div>

<?php require_once('footer.php') ?>

<!-- ha azt megválaszolod el kell tárolni majd adatbázisban, ha ezt megtetted akkor kapsz 500 free creditet, de ilyet csak egyszer lehet. A kérdések a (creditvétel) adatbázisból fognak betölteni, lesz a kérdések tábla és lesz a válaszok tábla, emellé minden felhasználóhoz van creditvetel változó a regisztrációnál ami 0, ha megkapod a free creditet az 1-re ugrik és utána már nem fogsz tudni igényelni. -->