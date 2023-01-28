<?php require_once('header.php') ?>

ehhez kell még két adatbázis, kell egy form is, amiből random kérdések ugranak ki egy gomb hatására és ha azt megválaszolod el kell tárolni majd adatbázisban, ha ezt megtetted akkor kapsz 500 free creditet, de ilyet csak egyszer lehet.
A kérdések a (creditvétel) adatbázisból fognak betölteni, lesz a kérdések tábla és lesz a válaszok tábla, emellé minden felhasználóhoz van creditvetel változó a regisztrációnál ami 0, ha megkapod a free creditet az 1-re ugrik és utána már nem fogsz tudni igényelni.

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form>
                <div class="card" style="width: 35rem;">
                    <div class="card-body">
                        <h5 class="card-title">Kérdés</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <!-- <button type="submit" id="search" name="search" class="btn btn-dark">Információk</button>
                        <div class="alert alert-info" role="alert">
                            A simple info alert—check it out!
                        </div> -->
                       
                    </div>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>

</div>

<?php require_once('footer.php') ?>