<?php
require_once('database.php');

if (isset($_POST['submit'])) {

    /* Párosítás adatok */
    $id = mysqli_real_escape_string($connection, $_POST['meccs_id']);
    $query = "SELECT * FROM csapat_parositas WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $csapatParositas = mysqli_fetch_assoc($result);


    /* CSAPATOK GLOBALS */
    $hazai_csapat = $csapatParositas['hazai_csapat'];
    $idegen_csapat = $csapatParositas['idegen_csapat'];

    /* Játékos Adatok Hazai */
    $query_hazai = "SELECT * FROM jatekosok WHERE csapat = '$hazai_csapat'";
    $result_hazai = mysqli_query($connection, $query_hazai);

    /* Játékos Adatok Idegen */
    $query_idegen = "SELECT * FROM jatekosok WHERE csapat = '$idegen_csapat'";
    $result_idegen = mysqli_query($connection, $query_idegen);

    /* JÁTÉKOS GLOBALAS */
    $hazai_jatekosok = array();
    $idegen_jatekosok = array();



    while ($row = mysqli_fetch_assoc($result_hazai)) {
        array_push($hazai_jatekosok, $row);
    }

    while ($row = mysqli_fetch_assoc($result_idegen)) {
        array_push($idegen_jatekosok, $row);
    }

    $kapus_hazai = $hazai_jatekosok[0];
    $kapus_idegen = $idegen_jatekosok[0];

    /* Események száma egy félidő alatt */
    $time = 10;

    $felido = 1; /* 1 vagy 2 */

    /* Events */
    $events = array(
        '0' => 'Futás',
        '1' => 'Labdaszerzés',
        '2' => 'Passzol',
        '3' => 'Kapuralövés',
        '4' => 'Szabadrúgás'
    );


    /* GLOBALS */

    $csapatnal_a_labda; /* Melyik csapatnál a labda */
    $playernel_a_labda;  /* Melyik playernél a labda */

    $hazai_score = 0;
    $idegen_score = 0;

    $esemenyek = array();

    for ($i = 0; $i < ($time * 2); $i++) {

        /* Kezdőrúgás első és második félidőben */
        if ($i == 0 || $i == 10) {
            array_push($esemenyek, KezdoRugas($felido));
        }

        /* A kezdés után legyen egy labdavezetés legalább. */
        if ($i == 1 || $i == 11) {
            $event = 0;
        } else {
            $event = rand(0, 4);
        }

        EventHandler($event);


        if ($i == 9) { /* A kilencedik esemény után növelem a félidőt. */
            $felido++;
        }

        if ($i == $time * 2 - 1) {
            $lefujva = "A bíró a szájához emeli a sípot, és a meccs véget ér. A végeredmény: " . $hazai_score . " - " . $idegen_score;
            array_push($esemenyek, $lefujva);
        }
    }

    /* ITT KELL MAJD ADATBÁZISBA FELTÖLTENI AZ ESEMÉNYEK ARRAY TARTALMÁT. */

    foreach ($esemenyek as $key => $value) {
        $sql = "INSERT INTO `meccs_lejatszas`( `meccsid`, `esemenyek`) VALUES ($id, '$value')";
        mysqli_query($connection, $sql);
    }


    /* A fogadás eredmény megállapítása */
    /* Ha 1 => Hazai, 2 => Döntetlen, 3 => Idegen  */
    $fogadas_eredmeny;
    if ($hazai_score > $idegen_score) {
        $fogadas_eredmeny = 1;
    } else if ($idegen_score > $hazai_score) {
        $fogadas_eredmeny = 3;
    } else {
        $fogadas_eredmeny = 2;
    }


    /* Az eredmények feltöltése a csapatpárosítás táblába */

    $date = date('Y-m-d'); //Meccs dátuma, adott nap.
    $eredmeny_query = "UPDATE `csapat_parositas` SET `eredmeny_hazai`='$hazai_score',`eredmeny_idegen`='$idegen_score',`idopont`='$date', `fogadas_eredmeny` = $fogadas_eredmeny WHERE id = $id";
    mysqli_query($connection, $eredmeny_query);

    /* Nyeremények megállapítása és kiosztása */


    $fogadasok_query = "SELECT * FROM fogadas WHERE meccsId = $id";
    $fogadasok_result = mysqli_query($connection, $fogadasok_query);

    /* Meccs szorzói */
    $idegen_szorzo  = "SELECT idegen_sz FROM csapat_parositas WHERE id = '$id'";
    $hazai_szorzo  = "SELECT hazai_sz FROM csapat_parositas WHERE id = '$id'";
    $dontetlen_szorzo  = "SELECT dontetlen_sz FROM csapat_parositas WHERE id = '$id'";

    $result_idegen = (int)mysqli_fetch_row(mysqli_query($connection, $idegen_szorzo))[0];
    $result_hazai = (int)mysqli_fetch_row(mysqli_query($connection, $hazai_szorzo))[0];
    $result_dontetlen = (int)mysqli_fetch_row(mysqli_query($connection, $dontetlen_szorzo))[0];
    /*  */

    while ($row = mysqli_fetch_assoc($fogadasok_result)) {
        $user_id = $row['felhasznaloId'];
        $credit = $row['credit'];

        $nyeremeny_osszeg;

        if ($fogadas_eredmeny == $row['fogadas_tipusa']) {
            $nyeremeny_osszeg = $row['credit'];
        }
        else {
            $nyeremeny_osszeg = 0; /* Nem nyert, korábban a fogadás kezelésénél már elvettük tőle a pénzt. */
        }

        $update_jatekos_query = "UPDATE registered SET credit = (credit + $nyeremeny_osszeg) WHERE id = ".$row['felhasznaloId']; 
        mysqli_query($connection, $update_jatekos_query);

        $sql_nyeremeny = 'INSERT INTO nyeremeny (nyeremeny, felhasznaloId, fogadasId) VALUES ('. $nyeremeny_osszeg.','. $row["felhasznaloId"].','. $row["id"].')';
        var_dump($sql_nyeremeny);
        mysqli_query($connection, $sql_nyeremeny);
    }
}

?>

<?php

/* Event Handler */

function EventHandler($eventId)
{
    switch ($eventId) {
        case '0':
            array_push($GLOBALS['esemenyek'], Futas());
            break;
        case '1':
            array_push($GLOBALS['esemenyek'], Labdaszerzes());
            break;
        case '2':
            array_push($GLOBALS['esemenyek'], Passz());
            break;
        case '3':
            array_push($GLOBALS['esemenyek'], KapuraLoves());
            break;
        case '4':
            array_push($GLOBALS['esemenyek'], Szabadrugas());
            break;

        default:
            # code...
            break;
    }
}

/* Események funkciói */

function KezdoRugas($felido)
{
    if ($felido == 1) {
        /* Random játékos akihez kerül a labda */
        $player_in_event = rand(1, 10); /* Melyik játékoshoz kerül a labda */
        $GLOBALS['playernel_a_labda'] = $GLOBALS['hazai_jatekosok'][$player_in_event];

        /* Csapatkövetés */
        $GLOBALS['csapatnal_a_labda'] = $GLOBALS['hazai_csapat'];
        return $GLOBALS['hazai_csapat'] . " elkezdte a meccset. " . $GLOBALS['playernel_a_labda']['jatekos_nev'] . " vezeti a labdát.";
    } else if ($felido == 2) {

        /* Random játékos akihez kerül a labda */
        $player_in_event = rand(1, 10); /* Melyik játékoshoz kerül a labda */
        $GLOBALS['playernel_a_labda'] = $GLOBALS['idegen_jatekosok'][$player_in_event];

        /* Csapatkövetés */
        $GLOBALS['csapatnal_a_labda'] = $GLOBALS['idegen_csapat'];


        return $GLOBALS['idegen_csapat'] . " elkezdte a második félidőt. " . $GLOBALS['playernel_a_labda']['jatekos_nev'] . " vezeti a labdát.";
    }
}

function Futas()
{
    return $GLOBALS['playernel_a_labda']['jatekos_nev'] . " vezeti a labdát.";
}

function Passz()
{

    /* Kinek passzol */

    $player_in_event = rand(1, 10); /* Melyik játékoshoz kerül a labda */

    if ($GLOBALS['csapatnal_a_labda'] == $GLOBALS['hazai_csapat']) {
        /* Újrasorsolás, amíg olyan játékosnak nem akar passzolni, aki nem saját maga */
        if ($GLOBALS['playernel_a_labda']['jatekos_nev'] == $GLOBALS['hazai_jatekosok'][$player_in_event]['jatekos_nev']) {
            $player_in_event = rand(1, 10);
            $GLOBALS['playernel_a_labda'] = $GLOBALS['hazai_jatekosok'][$player_in_event];
        } else {
            $GLOBALS['playernel_a_labda'] = $GLOBALS['hazai_jatekosok'][$player_in_event];
        }
    } else {
        if ($GLOBALS['playernel_a_labda']['jatekos_nev'] == $GLOBALS['idegen_jatekosok'][$player_in_event]['jatekos_nev']) {
            $player_in_event = rand(1, 10);
            $GLOBALS['playernel_a_labda'] = $GLOBALS['idegen_jatekosok'][$player_in_event];
        } else {
            $GLOBALS['playernel_a_labda'] = $GLOBALS['idegen_jatekosok'][$player_in_event];
        }
    }


    return "Passzol " . $GLOBALS['playernel_a_labda']['jatekos_nev'] . " felé. Most nála a labda.";
}

function KapuraLoves()
{

    if ($GLOBALS['csapatnal_a_labda'] == $GLOBALS['hazai_csapat']) {


        $lovo_random = rand(1, 10);
        $vedo_random = rand(1, 10);

        if ($GLOBALS['playernel_a_labda']['pontossag'] * $lovo_random >= $GLOBALS['kapus_idegen']['vedekezes'] * $vedo_random) {

            $GLOBALS['hazai_score']++;

            /* Mielőtt átállítom a birtoklásokat kiíratom, hogy ki mit csinált. */
            $string_to_return = $GLOBALS['playernel_a_labda']['jatekos_nev'] . " vezeti a labdát. Kikerüli a védőt! ÉÉÉÉS... GÓÓÓÓL. Az eredmény: " . $GLOBALS['hazai_score'] . " - " . $GLOBALS['idegen_score'] . " A " . $GLOBALS['csapatnal_a_labda'] . " boldogan feláll a kezdéshez.";

            $player_in_event = rand(1, 10); /* Melyik játékoshoz kerül a labda */
            $GLOBALS['csapatnal_a_labda'] = $GLOBALS['idegen_csapat'];
            $GLOBALS['playernel_a_labda'] = $GLOBALS['idegen_jatekosok'][$player_in_event];

            /* Hozzárakom, hogy kinél van most a labda a kezdés után. */
            $string_to_return .= $GLOBALS['playernel_a_labda']['jatekos_nev'] . " vezeti a labdát.";

            return $string_to_return;
        } else {

            $string_to_return = $GLOBALS['playernel_a_labda']['jatekos_nev'] . " vezeti a labdát. Kikerüli a védőt! ÉÉÉÉS... MELLÉ. " . $GLOBALS['kapus_idegen']['jatekos_nev'] . " kirúgáshoz készülődik. ";

            $player_in_event = rand(1, 10); /* Melyik játékoshoz kerül a labda */
            $GLOBALS['csapatnal_a_labda'] = $GLOBALS['idegen_csapat'];
            $GLOBALS['playernel_a_labda'] = $GLOBALS['idegen_jatekosok'][$player_in_event];

            $string_to_return .= $GLOBALS['playernel_a_labda']['jatekos_nev'] . " szerzi meg a labdát.";
            return   $string_to_return;
        }
    } else {
        $lovo_random = rand(1, 10);
        $vedo_random = rand(1, 10);

        if ($GLOBALS['playernel_a_labda']['pontossag'] * $lovo_random >= $GLOBALS['kapus_hazai']['vedekezes'] * $vedo_random) {

            $GLOBALS['idegen_score']++;

            $string_to_return = $GLOBALS['playernel_a_labda']['jatekos_nev'] . " vezeti a labdát. Kikerüli a védőt! ÉÉÉÉS... GÓÓÓÓL. Az eredmény: " . $GLOBALS['hazai_score'] . " - " . $GLOBALS['idegen_score'] . " A " . $GLOBALS['csapatnal_a_labda'] . " csalódottan feláll a kezdéshez. ";

            $player_in_event = rand(1, 10); /* Melyik játékoshoz kerül a labda */
            $GLOBALS['csapatnal_a_labda'] = $GLOBALS['hazai_csapat'];
            $GLOBALS['playernel_a_labda'] = $GLOBALS['hazai_jatekosok'][$player_in_event];

            $string_to_return .= $GLOBALS['playernel_a_labda']['jatekos_nev'] . " vezeti a labdát.";

            return $string_to_return;
        } else {

            $string_to_return = $GLOBALS['playernel_a_labda']['jatekos_nev'] . " vezeti a labdát. Kikerüli a védőt! ÉÉÉÉS... MELLÉ. " . $GLOBALS['kapus_hazai']['jatekos_nev'] . " kirúgáshoz készülődik. ";

            $player_in_event = rand(1, 10); /* Melyik játékoshoz kerül a labda */
            $GLOBALS['csapatnal_a_labda'] = $GLOBALS['hazai_csapat'];
            $GLOBALS['playernel_a_labda'] = $GLOBALS['hazai_jatekosok'][$player_in_event];

            $string_to_return .= $GLOBALS['playernel_a_labda']['jatekos_nev'] . " szerzi meg a labdát.";

            return $string_to_return;
        }
    }
}

function Labdaszerzes()
{
    $szerelo_random = rand(1, 10);
    $vezeto_random = rand(1, 10);

    /* Hazai csapat vagy idegen ? */
    if ($GLOBALS['csapatnal_a_labda'] == $GLOBALS['hazai_csapat']) {
        $szerelni_akaro = $GLOBALS['idegen_jatekosok'][$szerelo_random];
        /* Ha gyorsabb a támadó mint a védő védekezése, akkor marad a labda különben elmegy */
        if ($GLOBALS['playernel_a_labda']['sebesseg'] * $vezeto_random >= $szerelni_akaro['vedekezes'] * $szerelo_random) {
            return $szerelni_akaro['jatekos_nev'] . " megpróbálja elvenni a labdát " . $GLOBALS['playernel_a_labda']['jatekos_nev'] . "-től, de az kicselezi és fut tovább.";
        } else {
            $GLOBALS['csapatnal_a_labda'] = $GLOBALS['idegen_csapat'];
            $GLOBALS['playernel_a_labda'] = $szerelni_akaro;

            return $szerelni_akaro['jatekos_nev'] . " sikeresen megszerezte a labdát és gyors ellentámadást indít.";
        }
    } else {
        $szerelni_akaro = $GLOBALS['hazai_jatekosok'][$szerelo_random];

        /* Ha gyorsabb a támadó mint a védő védekezése, akkor marad a labda különben elmegy */
        if ($GLOBALS['playernel_a_labda']['sebesseg'] * $vezeto_random >= $szerelni_akaro['vedekezes'] * $szerelo_random) {
            return $szerelni_akaro['jatekos_nev'] . " megpróbálja elvenni a labdát " . $GLOBALS['playernel_a_labda']['jatekos_nev'] . "-től, de az kicselezi és fut tovább.";
        } else {
            $GLOBALS['csapatnal_a_labda'] = $GLOBALS['hazai_csapat'];
            $GLOBALS['playernel_a_labda'] = $szerelni_akaro;

            return $szerelni_akaro['jatekos_nev'] . " sikeresen megszerezte a labdát és gyors ellentámadást indít.";
        }
    }
}

function Szabadrugas()
{

    $lap = rand(1, 10);
    $szin = "";

    if ($lap == 1) {
        $szin = "PIROS lap.";
    } else if ($lap > 1 && $lap < 5) {
        $szin = "SÁRGA lap.";
    } else {
        $szin = "végül eltekint a laptól.";
    }

    return "OUCH! Ez biztos fájt. A bíró a zsebe felé nyúl... ééés... " . $szin . " Szabadrúgást kap a " . $GLOBALS['csapatnal_a_labda'] . ", melyet gyorsan el is végeztek.";
}

?>
