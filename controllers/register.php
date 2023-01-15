<?php

require_once('database.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $eletkor = mysqli_real_escape_string($connection, $_POST['eletkor']);
    $credit = 1500;
    $credit_vetel = 0;
    $password_confirm = mysqli_real_escape_string($connection, $_POST['password_confirm']);


    $check_query = "SELECT * FROM registered WHERE email = '$email'";
    $result = mysqli_query($connection, $check_query);


    $query = "INSERT INTO `registered`(`username`, `password`, `email`, `eletkor`, `credit`, `credit_vetel`) VALUES (?,?,?,?, $credit, $credit_vetel);";
    $statement = mysqli_stmt_init($connection);

    if (empty($username) || empty($password) || empty($email) || empty($eletkor)) {
        echo 'Minden adatot tölts ki!';
    } elseif (mysqli_num_rows($result) > 0) {
        echo 'Ez az email cím már létezik.';
    } elseif ($password != $password_confirm) {
        echo 'A jelszavak nem egyeznek meg.';
    } elseif (strlen($password) && strlen($password_confirm) < 6) {
        echo 'A jelszavad túl rövid, 6-nál több karaktert kell tartalmaznia.';
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if (mysqli_stmt_prepare($statement, $query) == false) {
            echo 'Az inicializálás nem működik.';
        } else {
            mysqli_stmt_bind_param($statement, 'ssss', $username, $hashed_password, $email, $eletkor);
            mysqli_stmt_execute($statement);
        }

        header('Location: ../login_form.php');
    }
} else {
    echo '403 error - Not authorized';
}
