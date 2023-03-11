<?php
require_once('database.php');

if (isset($_POST['submit'])) {
    $hazai_cs = mysqli_real_escape_string($connection, $_POST['hazai_cs']);
    $vendeg_cs = mysqli_real_escape_string($connection, $_POST['vendeg_cs']);
    $hazai_sz = mysqli_real_escape_string($connection, $_POST['hazai_sz']);
    $dontetlen_sz = mysqli_real_escape_string($connection, $_POST['dontetlen_sz']);
    $idegen_sz = mysqli_real_escape_string($connection, $_POST['idegen_sz']);

    $ketto_csapat = $hazai_cs . ' - ' . $vendeg_cs;

    $check_query = "SELECT * FROM `registered` WHERE `admin` = 1;";
    $result = mysqli_query($connection, $check_query);

    $query = "INSERT INTO `csapat_parositas`(`hazai_sz`, `dontetlen_sz`, `idegen_sz`, `hazai_idegen_cs`) VALUES (?,?,?,?)";
    $statement = mysqli_stmt_init($connection);

    if ($hazai_cs != $vendeg_cs) {
        if (empty($hazai_cs) || empty($vendeg_cs) || empty($hazai_sz) || empty($dontetlen_sz) || empty($idegen_sz)) {
            echo 'Minden adatot tölts ki!';
        } else {

            if (mysqli_stmt_prepare($statement, $query) == false) {
                echo 'Az inicializálás nem működik.';
            } else {
                mysqli_stmt_bind_param($statement, 'ssss', $hazai_sz, $dontetlen_sz, $idegen_sz, $ketto_csapat);
                mysqli_stmt_execute($statement);
            }
            header('Location: ../kozelgo_meccs.php');
        }
    } else {
        echo 'Nem adhatod meg ugyanazt a csapatot kétszer';
    }
} else {
    echo 'A párosítás nem sikerült.';
}
?>
