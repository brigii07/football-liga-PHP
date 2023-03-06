<?php require_once('header.php') ?>

<?php

$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'football_projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);

$sql_query = 'SELECT * FROM uzenetek';
$result = mysqli_query($connection, $sql_query);

?>

<style>
    .vl {
        border-left: 95px solid #212529;
        border-right: 95px solid #212529;
        height: 341px;
    }

    .kartya {
        margin-top: 10px;
        position: absolute;
        left: 200px;
        width: 520px;
    }

    .kartya2 {
        position: absolute;
        right: 200px;
        width: 450px;
    }
</style>


<div class="vl">
    <div class="container py-5">
        <div class="row">
            <?php
            if ($_SESSION['user']['admin'] == 1) {

                $sql = $connection->query('SELECT * FROM uzenetek');
                echo '<div class="col-6">
                    <div class="card mb-4">
                       <div class="card-body text-center">
                       <h5 class="my-3">Beérkezett hibaüzenetek</h5>
                 <div class="d-flex justify-content-center mb-2">
                                         </div>';

                while ($row = $sql->fetch_array()) {
                    echo '
                                                 <hr>
                     
                                                 <div class="row">

                                                     <div class="col-sm-6">
                                                         <p class="mb-0">' . $row['email_cim'] . '</p>
                                                     </div>
                                                     <div class="col-sm-6">
                                                         <p class="text-muted mb-0">' . $row['uzenet'] . '</p>
                                                     </div>
                                                 </div>
                                                 <hr>';
                }
                echo ' </div>
                    </div>
                </div>';
            }
            ?>
            <div class="col-6">
                <div class="col mb-4">
                    <div class="card-body">
                        <p class="text-center"><b>Válaszüzenet</b></p>
                        <form method="POST" action="controllers/valasz_uzenet.php">

                            <div class="form-outline mb-3">
                                <input type="email" id="cimzett" name="cimzett" class="form-control" placeholder="email@example.com" />
                                <label class="form-label" for="cimzett"><b>Adja meg a címzett email címét</b></label>
                            </div>

                            <div class="form-outline mb-3">
                                <textarea class="form-control" id="uzenet" name="uzenet" rows="4" placeholder="Maximum 255 karakter..."></textarea>
                                <label class="form-label" for="uzenet"><b>Írja ide üzenetét</b></label>

                            </div>

                            <button type="submit" id="submit" name="submit" class="btn btn-dark btn-block mb-4">Elküldés</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-1">
</div>


<div class="col-4"></div>

</div>
</div>



<div class="vl"></div>

<?php require_once('footer.php') ?>