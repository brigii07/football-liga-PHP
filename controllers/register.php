<?php

require_once('database.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $eletkor = mysqli_real_escape_string($connection, $_POST['eletkor']);

    $admin = mysqli_real_escape_string($connection, $_POST['admin']);
    $credit = 1500;
    $credit_vetel = 0;
    $password_confirm = mysqli_real_escape_string($connection, $_POST['password_confirm']);

    $check_query = "SELECT * FROM registered WHERE email = '$email'";
    $result = mysqli_query($connection, $check_query);


    $query = "INSERT INTO `registered`(`username`, `password`, `email`, `eletkor`, `credit`, `credit_vetel`, `admin`) VALUES (?,?,?,?,?,?,?);";
    $statement = mysqli_stmt_init($connection);

    if (empty($username) || empty($password) || empty($email) || empty($eletkor)) {
        header('Location: ../register_form.php?errorures=true');
    } elseif (mysqli_num_rows($result) > 0) {
        header('Location: ../register_form.php?errorlet=true');
    } elseif ($password != $password_confirm) {
        header('Location: ../register_form.php?errornem=true');
    }
    elseif(preg_match($email, "@"))
    {
        header('Location: ../register_form.php?errormeg=true');
    } 
    elseif (strlen($password) && strlen($password_confirm) < 6) {
        header('Location: ../register_form.php?errorrovid=true');
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if (mysqli_stmt_prepare($statement, $query) == false) {
            header('Location: ../register_form.php?errorin=true');
        } else {
            mysqli_stmt_bind_param($statement, 'sssssss', $username, $hashed_password, $email, $eletkor, $credit, $credit_vetel, $admin);
            mysqli_stmt_execute($statement);
        }

        header('Location: ../login_form.php?success=true');
    }
} else {
    header('Location: ../register_form.php?error=true');
}
?>
