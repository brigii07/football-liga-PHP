<?php
require_once('database.php');

if (isset($_POST['submit'])) {
    $hazai_cs = mysqli_real_escape_string($connection, $_POST['hazai_cs']);
    $vendeg_cs = mysqli_real_escape_string($connection, $_POST['vendeg_cs']);
    $hazai_sz = mysqli_real_escape_string($connection, $_POST['hazai_sz']);
    $dontetlen_sz = mysqli_real_escape_string($connection, $_POST['dontetlen_sz']);
    $idegen_sz = mysqli_real_escape_string($connection, $_POST['idegen_sz']);

    $check_query = "SELECT * FROM `registered` WHERE `admin` = 1;";
    $result = mysqli_query($connection, $check_query);

    $query = "INSERT INTO `csapat_parositas`(`hazai_sz`, `dontetlen_sz`, `idegen_sz`, hazai_csapat, idegen_csapat) VALUES (?,?,?,?,?)";
    $statement = mysqli_stmt_init($connection);

    if ($hazai_cs != $vendeg_cs) {
        if (empty($hazai_cs) || empty($vendeg_cs) || empty($hazai_sz) || empty($dontetlen_sz) || empty($idegen_sz)) {
            header('Location:../kozelgo_meccs.php?ures=true');
        } else {

            if (mysqli_stmt_prepare($statement, $query) == false) {
                header('Location:../kozelgo_meccs.php?inic=true');
            } else {
                mysqli_stmt_bind_param($statement, 'sssss', $hazai_sz, $dontetlen_sz, $idegen_sz, $hazai_cs, $vendeg_cs);
                mysqli_stmt_execute($statement);
            }
            header('Location: ../kozelgo_meccs.php?success=true');
        }
    } else {
        header('Location:../kozelgo_meccs.php?ketszer=true');
    }
} else {
    header('Location:../kozelgo_meccs.php?nemsikerult=true');
}
/* Kész */
?>