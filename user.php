<?php require_once('header.php');
$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'football_projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);

$sql_query = 'SELECT * FROM uzenetek';
$result = mysqli_query($connection, $sql_query);

/* Aktuális user adatok lekérése (fogadás utáni CR frissítés) */
$userDataQuery = "SELECT * FROM registered WHERE id = ". $_SESSION['user']['id'];
$userData = mysqli_fetch_assoc(mysqli_query($connection, $userDataQuery));

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
            top:485px;
            right: 218px;
            width: 150px;
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
                                <button type="submit" class="btn btn-dark">Közelgő meccs kijelölése</button>
                            </form>
                            <form action="meccs_lejatszasa.php">
                                <button type="submit" class="btn btn-outline-dark ms-1">Meccs lejátszása</button>
                            </form>
                        </div>';
                            } else {
                                echo '<div class="d-flex justify-content-center mb-2">
                            <form action="fogadas.php">
                                <button type="submit" class="btn btn-dark">Fogadás</button>
                            </form>
                            <form action="credit.php">
                                <button type="submit" class="btn btn-outline-dark ms-1">Credit vétel</button>
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
                                            echo '<p class="text-muted mb-0">' . $userData["credit"] . ' CR </p>'; /* Itt le kell kérni az adatbázisból, vagy fogadás után nem frissül csak ha újra bejelentkezik az ember */
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
                                        if (isset($_SESSION['user'])) {
                                            (int)$credit_vetele = $userData["credit_vetel"];

                                            if ($credit_vetele == 0) {
                                                echo '<p class="text-muted mb-0">3 lehetőséged van credit igénylésre.</p>';
                                            }
                                            elseif($credit_vetele == 1)
                                            {
                                                echo '<p class="text-muted mb-0">2 lehetőséged van credit igénylésre.</p>';
                                            }
                                            elseif ($credit_vetele == 2) {
                                                echo '<p class="text-muted mb-0">1 lehetőséged van credit igénylésre.</p>';
                                            }
                                             elseif ($credit_vetele == 3) {
                                                echo '<p class="text-muted mb-0">Már nincs lehetőséged igényelni plusz creditet.</p>';
                                            }
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

                                                     <div class="col-sm-6">
                                                         <p class="mb-0">' . $row['email_cim'] . '</p>
                                                     </div>
                                                     <div class="col-sm-6">
                                                         <p class="text-muted mb-0">' . $row['uzenet'] . '</p>
                                                     </div>
                                                    
                                                 </div>
                                                 <hr>
                                            ';
                    }
                    echo ' <div class="text-center">
                    <form action="admin_valasz.php">
                    <button class="btn btn-dark">Válasz</button>
                    <form>
                       </div>
                     </div>
                    </div>
                </div>';
                } else {
                    echo '
                    <div class="col-6">
                    <div class="col mb-4">
                    <div class="card-body">
                <p class="text-center"><b>Probléma esetén</b></p>
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

                    <button type="submit" id="submit" name="submit" class="btn btn-dark btn-block mb-4">Elküldés</button>
                </form>
                    </div>
            </div>
            </div>';
            if (isset($_GET['errorures'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hiba!</strong> Minden adatot tölts ki!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                ';
            } elseif (isset($_GET['errorh'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hiba!</strong> Ez az email cím hibás.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } elseif (isset($_GET['errorin'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Hiba!</strong> Az inicializálás nem működik.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            elseif (isset($_GET['success'])) {
              echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Üzenet elküldve!</strong> Hamarosan felvesszük Önnel a kapcsolatot.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
          } elseif (isset($_GET['errornem'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hiba!</strong> Az üzenetet nem tudtuk kézbesíteni.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
                }
                ?>
                <div class="col-4"></div>
            </div>
        </div>

    </div>

    <div class="vl"></div>

</section>
<!-- Kész -->
<?php require_once('footer.php') ?>