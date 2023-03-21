<?php
require_once('database.php');
session_start();

if (isset($_SESSION['user'])) {
    $felhasznalo_id = $_SESSION['user']['id'];
    $credit = $_SESSION['user']['credit'];
    if (isset($_POST['submit'])) {
        $meccs = mysqli_real_escape_string($connection, $_POST['meccs']);
        $hazai =  isset($_POST['hazai']) ? mysqli_real_escape_string($connection, $_POST['hazai']) : 0;
        $dontetlen = isset($_POST['dontetlen']) ? mysqli_real_escape_string($connection, $_POST['dontetlen']) : 0;
        $idegen = isset($_POST['idegen']) ? mysqli_real_escape_string($connection, $_POST['idegen']) : 0;
        $ossz_credit = mysqli_real_escape_string($connection, $credit);
        $felhasznaloid = mysqli_real_escape_string($connection, $felhasznalo_id);

        $kiadott_credit;
        $nyerheto_credit;
        $maradt_credit;

        $id = "SELECT id FROM csapat_parositas WHERE id = '$meccs'";
        $idegen_szorzo  = "SELECT idegen_sz FROM csapat_parositas WHERE id = '$meccs'";
        $hazai_szorzo  = "SELECT hazai_sz FROM csapat_parositas WHERE id = '$meccs'";
        $dontetlen_szorzo  = "SELECT dontetlen_sz FROM csapat_parositas WHERE id = '$meccs'";

        $result_idegen = (int)mysqli_fetch_row(mysqli_query($connection, $idegen_szorzo))[0];
        $result_hazai = (int)mysqli_fetch_row(mysqli_query($connection, $hazai_szorzo))[0];
        $result_dontetlen =(int)mysqli_fetch_row(mysqli_query($connection, $dontetlen_szorzo))[0];


        /* Fogadas típusának és a ??nyereménynek?? a meghatározása */
        /* Ha 1 => Hazai, 2 => Döntetlen, 3 => Idegen  */

        $fogadasTipus;

        if ($hazai == 0 && $dontetlen == 0) {
            $fogadasTipus = 3;
            $kiadott_credit = (int)$idegen;
            $maradt_credit = (int)$credit - (int)$kiadott_credit;
            $nyerheto_credit = (int)$kiadott_credit * (int)$result_idegen;
        } else if ($idegen == 0 && $hazai  == 0) {
            $fogadasTipus = 2;
            $kiadott_credit = (int)$dontetlen;
            $maradt_credit = (int)$credit - (int)$kiadott_credit;
            $nyerheto_credit = (int)$kiadott_credit * (int)$result_dontetlen;
        } else if ($dontetlen == 0 && $idegen == 0) {
            $fogadasTipus = 1;
            $kiadott_credit = (int)$hazai;
            $maradt_credit = (int)$credit - (int)$kiadott_credit;
            $nyerheto_credit = (int)$kiadott_credit * (int)$result_hazai;
        }

        
        $query = "INSERT INTO `fogadas`(`felhasznaloId`, `credit`, `meccsId`, `fogadas_tipusa`, `alapCredit`) VALUES (?,?,?,?,?)";
        $statement = mysqli_stmt_init($connection);

        if (empty($hazai) && empty($idegen) && empty($dontetlen)) {
            header('Location: ../fogadas_adatok.php?ures=true');
            echo 'Töltsd ki valamelyik adatot!';
        } else {

            if (mysqli_stmt_prepare($statement, $query) == false) {
                header('Location: ../fogadas_adatok.php?inic=true');
                echo 'Az inicializálás nem működik.';
            } else {
                mysqli_stmt_bind_param($statement, 'iiiii', $felhasznaloid, $nyerheto_credit, $meccs, $fogadasTipus, $kiadott_credit); /* Nem a nyerhetőt tároljuk el? */
                mysqli_stmt_execute($statement);

                $update_query = "UPDATE `registered` INNER JOIN `fogadas` ON fogadas.felhasznaloId = registered.id SET registered.credit='$maradt_credit'";
                mysqli_query($connection, $update_query);
            }
            header('Location: ../fogadas.php?success=true');
        }
    } else {
        header('Location: ../fogadas_adatok.php?error=true');
        echo 'A párosítás nem sikerült.';
    }
} else {
    header('Location: ../fogadas_adatok.php?mashiba=true');
    echo 'JAAAAAAAAj';
}
