<?php require_once('header.php') ?>
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
            <div class="col-3"> </div>
            <div class="col-6">
                <br>
                <?php
                if (isset($_GET['siker'])) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Siker!</strong> A credit vétele sikeres volt!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    ';
                } elseif (isset($_GET['erroruresc'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hiba!</strong> Nem válaszoltál a kérdésre, így nem igényelhetsz creditet.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } elseif (isset($_GET['nemigenyelhetsz'])) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hiba!</strong> Már nem igényelhetsz többször creditet.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                elseif(isset($_GET['errorini']))
                {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hiba!</strong> Az inicializálás nem működik.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                elseif(isset($_GET['error']))
                {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Hiba!</strong> A hiba beazonosítatlan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
                ?>
                <div>
                    <br>
                    <p><b>Adj meg egy számot <i>(A legnagyobb szám 7 lehet)</i></b></p>
                    <p><b>Egy bejelentkezés alkalmával egyszer igényelj kreditet.</b></p>
                    <form action="credit_atadas.php" method="GET">
                        <input type="number" name="szam" id="szam" placeholder="1" required min="1" max="7">
                        <button type="submit" id="kereso" name="kereso" class="btn btn-dark btn-sm">Elküldés</button>
                    </form>
                </div>
                <br>
                <form action="controllers/credit_vetel.php" method="POST">
                    <div class="card" style="width: 35rem;">
                        <div class="card-body">
                            <h5 class="card-title">Kérdés</h5>
                            <p class="card-text">Itt fog megjelenni a kérdésed, amint megadtál egy számot.</p>
                            <p><input type="text" class="form-control" name="leadas" id="leadas" placeholder="Válasz" required></p>
                        </div>
                    </div>
                </form>
                <br>

            </div>
            <div class="col-3"></div>
        </div>

    </div>
</div>

<div class="vl"></div>


<!-- Kész -->
<?php require_once('footer.php') ?>