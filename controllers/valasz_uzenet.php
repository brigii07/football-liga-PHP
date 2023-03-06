<?php

require_once('database.php');

if (isset($_POST['submit'])) {
    $cimzett = $uzenet = mysqli_real_escape_string($connection, $_POST['cimzett']);
    $uzenet = mysqli_real_escape_string($connection, $_POST['uzenet']);

    $query = "INSERT INTO `admin_valasz`(`valasz`, `cimzett`) VALUES (?,?);";
    $statement = mysqli_stmt_init($connection);

    if ( empty($uzenet)) {
        header('Location: ../user.php');
        echo 'Minden adatot tölts ki!';
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
            mysqli_stmt_bind_param($statement, 'ss', $uzenet, $cimzett);
            mysqli_stmt_execute($statement);
            header('Location: ../admin_valasz.php');
        }
    }
} else {
    header('Location: ../user.php');
    echo 'Az üzenetet nem tudtuk kézbesíteni';
}
?>