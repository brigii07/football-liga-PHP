<?php require_once('header.php');
$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'football_projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);

$sql_query = 'SELECT * FROM uzenetek';
$result = mysqli_query($connection, $sql_query);

?>

<section style="background-color: #838996;">
    <style>
        .vl {
            border-left: 95px solid #212529;
            border-right: 95px solid #212529;
            height: 341px;
        }
    </style>
    <div class="vl">
        <div class="container py-5">
            <div class="row">
                <div class="col-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">


                            <?php
                            if (isset($_SESSION['user'])) {
                                echo '<h5 class="my-3">' . $_SESSION["user"]["username"] . '</h5>';
                            }
                            ?>

                            <?php
                            if ($_SESSION['user']['admin'] == 1) {
                                echo '<p class="text-muted mb-1"> Admin jogosultság </p>';
                            } else {
                                echo '<p class="text-muted mb-1"> Regisztrált felhasználó </p>';
                            }
                            ?>

                            <?php
                            if ($_SESSION['user']['admin'] == 1) {
                                echo '<div class="d-flex justify-content-center mb-2">
                            <form action="kozelgo_meccs.php">
                                <button type="submit" class="btn btn-primary">Közelgő meccs kijelölése</button>
                            </form>
                            <form action="meccs_lejatszasa.php">
                                <button type="submit" class="btn btn-outline-primary ms-1">Meccs lejátszása</button>
                            </form>
                        </div>';
                            } else {
                                echo '<div class="d-flex justify-content-center mb-2">
                            <form action="fogadas.php">
                                <button type="submit" class="btn btn-primary">Fogadás</button>
                            </form>
                            <form action="credit.php">
                                <button type="submit" class="btn btn-outline-primary ms-1">Credit vétel</button>
                            </form>
                        </div>';
                            }

                            ?>
                            <br>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <?php
                                    if (isset($_SESSION['user'])) {
                                        echo '<p class="text-muted mb-0">' . $_SESSION["user"]["email"] . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Életkor</p>
                                </div>
                                <div class="col-sm-9">
                                    <?php
                                    if (isset($_SESSION['user'])) {
                                        echo '<p class="text-muted mb-0">' . $_SESSION["user"]["eletkor"] . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Credit</p>
                                </div>
                                <div class="col-sm-9">
                                    <?php
                                    if ($_SESSION['user']['admin'] == 1) {
                                        echo '<p class="text-muted mb-0">Nincs credit</p>';
                                    } else {
                                        if (isset($_SESSION['user'])) {
                                            echo '<p class="text-muted mb-0">' . $_SESSION["user"]["credit"] . 'CR </p>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Credit igénylése</p>
                                </div>
                                <div class="col-sm-9">
                                    <?php
                                    if ($_SESSION['user']['admin'] == 1) {
                                        echo '<p class="text-muted mb-0">Adminként nincs lehetőséged credit vásárlásra.</p>';
                                    } else {
                                        if ($_SESSION['user']['credit_vetel'] == 0) {
                                            echo '<p class="text-muted mb-0">3 lehetőséged van credit vásárlásra.</p>';
                                        } elseif ($_SESSION['user']['credit_vetel'] == 3) {
                                            echo '<p class="text-muted mb-0">Már nincs lehetőséged venni plusz creditet.</p>';
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Admin</p>
                                </div>
                                <div class="col-sm-9">
                                    <?php
                                    if ($_SESSION['user']['admin'] == 1) {
                                        echo '<p class="text-muted mb-0"> Igen </p>';
                                    } else {
                                        echo '<p class="text-muted mb-0"> Nem </p>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1">

                </div>
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

                                                     <div class="col-sm-4">
                                                         <p class="mb-0">' . $row['email_cim'] . '</p>
                                                     </div>
                                                     <div class="col-sm-5">
                                                         <p class="text-muted mb-0">' . $row['uzenet'] . '</p>
                                                     </div>
                                                     <div class="col-sm-3">
                                                        <button class="btn btn-dark">Válasz</button>
                                                     </div>
                                                 </div>
                                                 <hr>
                                            ';
                    }
                    echo ' </div>
                    </div>
                </div>';
                } else {
                    echo '<div class="col-md-6">
                <p><b>Probléma esetén</b></p>
                <form method="POST" action="controllers/uzenetek.php">
                    <div class="form-outline mb-3">
                        <input type="text" id="name" name="name" class="form-control" placeholder="valami123" />
                        <label class="form-label" for="name"><b>Adja meg a nevét</b></label>
                    </div>

                    <div class="form-outline mb-3">
                        <input type="email" id="cim" name="cim" class="form-control" placeholder="email@example.com" />
                        <label class="form-label" for="cim"><b>Adja meg az email címét</b></label>
                    </div>

                    <div class="form-outline mb-3">
                        <textarea class="form-control" id="uzenet" name="uzenet" rows="4" placeholder="Maximum 255 karakter..."></textarea>
                        <label class="form-label" for="uzenet"><b>Írja ide üzenetét</b></label>

                    </div>

                    <button type="submit" id="submit" name="submit" class="btn btn-primary btn-block mb-4">Elküldés</button>
                </form>
            </div>';
                }
                ?>
                <div class="col-4"></div>
            </div>
        </div>

    </div>

    <div class="vl"></div>

</section>
<?php require_once('footer.php') ?>