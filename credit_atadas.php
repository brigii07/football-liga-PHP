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
<style>
    .vl {
        border-left: 95px solid #212529;
        border-right: 95px solid #212529;
        height: 341px;
    }
</style>
<div class="vl">
    <div class="container">
        <div class="row">
            <div class="col-3">

               

            </div>
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
</div>

<div class="vl"></div>
<?php require_once('footer.php') ?>

<!-- Kész -->