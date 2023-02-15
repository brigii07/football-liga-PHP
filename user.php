<?php require_once('header.php') ?>

<section style="background-color: #838996;">
    <div class="container py-5">
        <div class="row">
        <?php 
                         if ($_SESSION['user']['admin'] == 1) {
                             echo '<div class="col-4"></div>';
                         };
                        ?>
            
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-body text-center">

                     <!--    ?php
                        if ($eredmeny == true) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Üzenet elküldve!</strong> Hamarosan felvesszük Önnel a kapcsolatot.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                        }
                        ?> -->


                        <?php
                        if (isset($_SESSION['user'])) {
                            echo '<h5 class="my-3">' . $_SESSION["user"]["username"] . '</h5>';
                        }
                        ?>

                        <?php 
                         if ($_SESSION['user']['admin'] == 1) {
                             echo '<p class="text-muted mb-1"> Admin jogosultság </p>';
                         }
                         else{
                             echo '<p class="text-muted mb-1"> Regisztrált felhasználó </p>';
                         }
                        ?>

                        <?php
                        if($_SESSION['user']['admin'] == 1)
                        {
                            echo '<div class="d-flex justify-content-center mb-2">
                            <form action="kozelgo_meccs.php">
                                <button type="submit" class="btn btn-primary">Közelgő meccs kijelölése</button>
                            </form>
                            <form action="meccs_lejatszasa.php">
                                <button type="submit" class="btn btn-outline-primary ms-1">Meccs lejátszása</button>
                            </form>
                        </div>';
                        }
                        else{
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
                                if($_SESSION['user']['admin'] == 1)
                                {
                                    echo '<p class="text-muted mb-0">Nincs credit</p>';
                                }
                                else{
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
                                if($_SESSION['user']['admin'] == 1)
                                {
                                    echo '<p class="text-muted mb-0">Adminként nincs lehetőséged credit vásárlásra.</p>';
                                }
                                else{
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
                                }
                                else{
                                    echo '<p class="text-muted mb-0"> Nem </p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if($_SESSION['user']['admin'] == 1)
            {

            }
            else
            {
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

</section>
<?php require_once('footer.php') ?>