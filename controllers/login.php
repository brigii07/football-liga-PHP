<?php
session_start();
require('database.php');
 
if (isset($_POST['submit'])) {
   
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $query = "SELECT * FROM registered WHERE username = '$username'";
    //$query_email = "SELECT * FROM registered WHERE email = '$email'";

    //$result_email = mysqli_query($connection, $query_email);
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result) != 1) {
        echo 'Nem találunk felhasználót ezzel a felhasználói névvel.';
    }
    //elseif(mysqli_num_rows($result_email) != 1)
    //{
      //  echo 'Nem találunk felhasználót ezzel az email címmel.';
    //}
    else {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password']) == true) 
        {
            
            $_SESSION['user'] = $user;
            header('Location: ../user.php?loggedIn=true');
        }
        else 
        {
           header('Location:../index.php?Incorrect_password');
        }

    }

}
?>