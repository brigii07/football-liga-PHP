<?php

require_once('database.php');

if (isset($_POST['submit'])) {
    $cimzett = $uzenet = mysqli_real_escape_string($connection, $_POST['cimzett']);
    $uzenet = mysqli_real_escape_string($connection, $_POST['uzenet']);

    $check = "SELECT * FROM registered WHERE email = '$cimzett'";
    $result = mysqli_query($connection, $check);

    $query = "INSERT INTO `admin_valasz`(`valasz`, `cimzett`) VALUES (?,?);";
    $statement = mysqli_stmt_init($connection);

    if (mysqli_num_rows($result) != 1) {
        header('Location:../admin_valasz.php?nincsem=true');
     }
      elseif(empty($uzenet)) {
        header('Location: ../admin_valasz.php?erroruzen=true');
    } else {

        if (mysqli_stmt_prepare($statement, $query) == false) {
            header('Location: ../admin_valasz.php?errorini=true');

            echo 'Az inicializálás nem működik.';
        } else {
            mysqli_stmt_bind_param($statement, 'ss', $uzenet, $cimzett);
            mysqli_stmt_execute($statement);
            header('Location: ../admin_valasz.php?siker=true');
        }
    }
} else {
    header('Location: ../admin_valasz.php?error=true');
}
?>