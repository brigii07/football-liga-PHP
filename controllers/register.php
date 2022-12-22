<?php

require_once('database.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $eletkor = mysqli_real_escape_string($connection, $_POST['eletkor']);
    $password_confirm = mysqli_real_escape_string($connection, $_POST['password_confirm']);


    $check_query = "SELECT * FROM registered WHERE email = '$email'";
    $result = mysqli_query($connection, $check_query);

    echo 'A ' . $username . ' nevű felhasználó sikeresen regisztrált.';

    $query = "INSERT INTO `registered`(`username`, `password`, `email`, `eletkor`) VALUES (?,?,?,?);";
    $statement = mysqli_stmt_init($connection);


    if (empty($username) || empty($password) || empty($email) || empty($eletkor)) {
        echo 'Minden adatot tölts ki!';
    } elseif (mysqli_num_rows($result) > 0) {
        echo 'Ez az email cím már létezik.';
    } elseif ($password != $password_confirm) {
        echo 'A jelszavak nem egyeznek meg.';
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        if (mysqli_stmt_prepare($statement, $query) == false) {
            echo 'Inicialization doesnt working';
        } else {
            mysqli_stmt_bind_param($statement, 'ssss', $username, $hashed_password, $email, $eletkor);
            mysqli_stmt_execute($statement);
        }

        echo 'Regisztráció sikeres volt.';
    }
} else {
    echo '403 error - Not authorized';
}
