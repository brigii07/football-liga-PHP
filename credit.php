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
        <div class="col-3"></div>
        <div class="col-6">
            <div>
                <br>
                <p><b>Adj meg egy számot</b></p>
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
        </div>
        <div class="col-3"></div>
    </div>

</div>
</div>

<div class="vl"></div>



<?php require_once('footer.php') ?>