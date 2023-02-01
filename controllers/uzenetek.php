<?php

require_once('database.php');

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $cim = mysqli_real_escape_string($connection, $_POST['cim']);
    $uzenet = mysqli_real_escape_string($connection, $_POST['uzenet']);

    $check_query = "SELECT * FROM registered WHERE email = '$cim'";
    $result = mysqli_query($connection, $check_query);
    $eredmeny = false;

    $query = "INSERT INTO `uzenetek`(`felhasznaloi_nev`, `email_cim`, `uzenet`) VALUES (?,?,?);";
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
            mysqli_stmt_bind_param($statement, 'sss', $name, $cim, $uzenet);
            mysqli_stmt_execute($statement);
            $eredmeny = true;
        }

        header('Location: ../user.php');
        return $eredmeny = true;
    }
} else {
    header('Location: ../user.php');
    echo 'Az üzenetet nem tudtuk kézbesíteni';
}
