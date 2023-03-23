<?php

require_once('database.php');

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $cim = mysqli_real_escape_string($connection, $_POST['cim']);
    $uzenet = mysqli_real_escape_string($connection, $_POST['uzenet']);

    $check_query = "SELECT * FROM registered WHERE email = '$cim'";
    $result = mysqli_query($connection, $check_query);

    $query = "INSERT INTO `uzenetek`(`uzenet`, `felhasznaloi_nev`, `email_cim`) VALUES (?,?,?);";
    $statement = mysqli_stmt_init($connection);

    if (empty($name) || empty($cim) || empty($uzenet)) {
        header('Location: ../user.php?errorures=true');
    } elseif (mysqli_num_rows($result) < 0) {
        header('Location: ../user.php?errorh=true');
    } else {

        if (mysqli_stmt_prepare($statement, $query) == false) {
            header('Location: ../user.php?errorin=true');
        } else {
            mysqli_stmt_bind_param($statement, 'sss', $uzenet, $name, $cim);
            mysqli_stmt_execute($statement);
            header('Location: ../user.php?success=true');
        }
    }
} else {
    header('Location: ../user.php?errornem=true');
}
/* Kész */
?>