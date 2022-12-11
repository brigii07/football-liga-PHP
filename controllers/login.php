<?php
session_start();
require('database.php');
 
if (isset($_POST['submit'])) {
   
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $query = "SELECT * FROM registered WHERE username = '$username'";
    $query1 = "SELECT * FROM registered WHERE email = '$email'";
    $result = mysqli_query($connection, $query, $query1);
    
    if (mysqli_num_rows($result) != 2) {
        echo 'No user found with this username';
        echo 'No user found with this email';
    }
    else {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password']) == true) 
        {
            echo 'Jelszó ok';
            $_SESSION['user'] = $user;
            header('Location: ../index.php?loggedIn=true');
        }
        else 
        {
           header('Location:../index.php?Incorrect_password');
        }

    }

}