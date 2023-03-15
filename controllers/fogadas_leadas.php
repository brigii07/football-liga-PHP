<?php
require_once('database.php');
session_start();

if (isset($_SESSION['user'])) {
    $felhasznalo_id = $_SESSION['user']['id'];
    $credit = $_SESSION['user']['credit'];
    if (isset($_POST['submit'])) {
        $meccs = mysqli_real_escape_string($connection, $_POST['hazai_idegen_cs']);
        $hazai =  mysqli_real_escape_string($connection, $_POST['hazai']);
        $dontetlen = mysqli_real_escape_string($connection, $_POST['dontetlen']);
        $idegen = mysqli_real_escape_string($connection, $_POST['idegen']);
        $ossz_credit = mysqli_real_escape_string($connection, $credit);
        $felhasznaloid = mysqli_real_escape_string($connection, $felhasznalo_id);

        $kiadott_credit;
        $nyerheto_credit;
        $maradt_credit;

        $id = "SELECT id FROM csapat_parositas WHERE hazai_idegen_cs = '$meccs'";
        $idegen_szorzo  = "SELECT idegen_sz FROM csapat_parositas WHERE hazai_idegen_cs = '$meccs'";
        $hazai_szorzo  = "SELECT hazai_sz FROM csapat_parositas WHERE hazai_idegen_cs = '$meccs'";
        $dontetlen_szorzo  = "SELECT dontetlen_sz FROM csapat_parositas WHERE hazai_idegen_cs = '$meccs'";

 /*        $result_idegen = mysqli_query($connection, $idegen_szorzo);
        $result_hazai = mysqli_query($connection, $hazai_szorzo);
        $result_dontetlen = mysqli_query($connection, $dontetlen_szorzo); */

        $idegen_sz = $result_idegen;
        var_dump($idegen_sz);

        if (empty($hazai) && empty($dontetlen)) {
            $kiadott_credit = (int)$idegen;
            $maradt_credit = (int)$credit - (int)$kiadott_credit;
            $nyerheto_credit = (int)$kiadott_credit * (int)$result_idegen;


        } else if (empty($idegen) && empty($hazai)) {
            $kiadott_credit = (int)$dontetlen;
            $maradt_credit = (int)$credit - (int)$kiadott_credit;
            $nyerheto_credit = (int)$kiadott_credit * (int)$result_dontetlen;
        } else {
            $kiadott_credit = (int)$hazai;
            $maradt_credit = (int)$credit - (int)$kiadott_credit;
            $nyerheto_credit = (int)$kiadott_credit * (int)$result_hazai; 
        }

        $query = "INSERT INTO `fogadas`(`felhasznaloId`, `credit`, `matchId`) VALUES (?,?,?)";
        $statement = mysqli_stmt_init($connection);
       
            if (empty($hazai) && empty($idegen) && empty($dontetlen)) {
                echo 'Töltsd ki valamelyik adatot!';
            } else {

                if (mysqli_stmt_prepare($statement, $query) == false) {
                    echo 'Az inicializálás nem működik.';
                } else {
                    mysqli_stmt_bind_param($statement, 'sss', $felhasznaloid, $kiadott_credit, $id);
                    mysqli_stmt_execute($statement);

                    $update_query = "UPDATE `registered` INNER JOIN `fogadas` ON fogadas.felhasznaloId = registered.id SET registered.credit='$maradt_credit'";
                    mysqli_query($connection, $update_query);
                }
                header('Location: ../user.php');
            }
        
    } else {
        echo 'A párosítás nem sikerült.';
    }
}
else {
    echo'JAAAAAAAAj';
}
