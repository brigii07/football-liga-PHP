<?php

require_once('database.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $informacio = mysqli_real_escape_string($connection, $_POST['informacio']);
    $password_confirm = mysqli_real_escape_string($connection, $_POST['password_confirm']);


    $check_query = "SELECT * FROM registered WHERE email = '$email'";
    $result = mysqli_query($connection, $check_query);

    echo 'A ' . $username . ' named user successfully registered.';

    $query = "INSERT INTO `registered`(`username`, `password`, `email`, `informacio`) VALUES (?,?,?,?);";
    $statement = mysqli_stmt_init($connection);



    if (empty($username) || empty($password) || empty($email) || empty($informacio)) {
        echo 'You should write everywhere';
    } elseif (mysqli_num_rows($result) > 0) {
        echo 'This email is already existing.';
    } elseif ($password != $password_confirm) {
        echo 'Passwords are different.';
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);


        if (mysqli_stmt_prepare($statement, $query) == false) {
            echo 'Inicialization doesnt working';
        } else {
            mysqli_stmt_bind_param($statement, 'ssss', $username, $hashed_password, $email, $informacio);
            mysqli_stmt_execute($statement);
        }

        echo 'Registration was successful';
    }
} else {
    echo '403 error - Not authorized';
}
