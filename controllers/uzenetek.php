<?php

require_once('database.php');

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $cim = mysqli_real_escape_string($connection, $_POST['cim']);
    $uzenet = mysqli_real_escape_string($connection, $_POST['uzenet']);

    $check_query = "SELECT * FROM registered WHERE email = '$cim'";
    $result = mysqli_query($connection, $check_query);
    $eredmeny = 0;

    $query = "INSERT INTO `uzenetek`(`uzenet`, `felhasznaloi_nev`, `email_cim`) VALUES (?,?,?);";
    $statement = mysqli_stmt_init($connection);

    if (empty($name) || empty($cim) || empty($uzenet)) {
        header('Location: ../user.php');
        echo 'Minden adatot tölts ki!';
    } elseif (mysqli_num_rows($result) < 0) {
        header('Location: ../user.php');
        echo 'Ez az email cím hibás.';
    } else {

        if (mysqli_stmt_prepare($statement, $query) == false) {
            header('Location: ../user.php');

            echo 'Az inicializálás nem működik.';
        } else {
           /*  $eredmeny++;
            if ($eredmeny == 1) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Üzenet elküldve!</strong> Hamarosan felvesszük Önnel a kapcsolatot.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
            } */
            mysqli_stmt_bind_param($statement, 'sss', $uzenet, $name, $cim);
            mysqli_stmt_execute($statement);
            header('Location: ../user.php');
        }
    }
} else {
    header('Location: ../user.php');
    echo 'Az üzenetet nem tudtuk kézbesíteni';
}
?>