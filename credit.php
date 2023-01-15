<?php require_once('header.php') ?>

ehhez kell még két adatbázis, kell egy form is, amiből random kérdések ugranak ki egy gomb hatására és ha azt megválaszolod el kell tárolni majd adatbázisban, ha ezt megtetted akkor kapsz 150 free creditet, de ilyet csak egyszer lehet.
A kérdések a (creditvétel) adatbázisból fognak betölteni, lesz a kérdések tábla és lesz a válaszok tábla, emellé minden felhasználóhoz van creditvetel változó a regisztrációnál ami 0, ha megkapod a free creditet az 1-re ugrik és utána már nem fogsz tudni igényelni. 

<?php require_once('footer.php') ?>