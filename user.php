<?php require_once('header.php') ?>

<section style="background-color: #838996;">
    <div class="container py-5">

        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo '<h5 class="my-3">' . $_SESSION["user"]["username"] . '</h5>';
                        }
                        ?>
                        <p class="text-muted mb-1">Regisztrált felhasználó</p>
                        <div class="d-flex justify-content-center mb-2">
                            <form action="fogadas.php">
                                <button type="submit" class="btn btn-primary">Fogadás</button>
                            </form>
                            <form action="credit.php">
                                <button type="submit" class="btn btn-outline-primary ms-1">Credit vétel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">
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
                            if (isset($_SESSION['user'])) {
                            echo '<p class="text-muted mb-0">' . $_SESSION["user"]["credit"] . '</p>';
                        }
                        ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Credit vételi lehetőség</p>
                            </div>
                            <div class="col-sm-9">
                            <?php
                            if ($_SESSION['user']['credit_vetel'] == 0) {
                            echo '<p class="text-muted mb-0">1 lehetőséged van credit vásárlásra.</p>';
                        }
                        elseif($_SESSION['user']['credit_vetel'] == 1)
                        {
                            echo '<p class="text-muted mb-0">Már nincs lehetőséged venni plusz creditet.</p>';
                        }

                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once('footer.php') ?>