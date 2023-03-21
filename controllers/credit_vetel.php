<?php require_once('database.php');
 session_start(); 

if(isset($_SESSION['user']))
{
    $vasarlas = $_SESSION['user']['credit_vetel']+1;
    $fel_id = $_SESSION['user']['id'];
    $osszcredit = $_SESSION['user']['credit'] + 500;
if (isset($_POST['submit'])) {
   
    $valasz = mysqli_real_escape_string($connection, $_POST['valasz']);
    $vasarolt_mar = mysqli_real_escape_string($connection, $vasarlas);
    $felhasznalo_id = mysqli_real_escape_string($connection, $fel_id);
    $credit = mysqli_real_escape_string($connection, $osszcredit);

    $check_query = "SELECT * FROM registered WHERE id = '$felhasznalo_id'";
    $result = mysqli_query($connection, $check_query);

    $query = "INSERT INTO `valaszok`(`valasz`, `vasarolt_mar`, `felhasznaloiId`) VALUES (?,?,?);";
    $statement = mysqli_stmt_init($connection);

    if (empty($valasz)) {
        header('Location: ../credit.php?erroruresc=true');
    } elseif ($vasarolt_mar == 3) {
        header('Location: ../credit.php?nemigenyelhetsz=true');
    } else {

        if (mysqli_stmt_prepare($statement, $query) == false) {
            header('Location: ../credit.php?errorini=true');
        } else {
            mysqli_stmt_bind_param($statement, 'sss', $valasz, $vasarolt_mar, $felhasznalo_id);
            mysqli_stmt_execute($statement);
             $update_query = "UPDATE registered INNER JOIN valaszok ON valaszok.felhasznaloiId = registered.id  
        SET registered.credit_vetel = '$vasarolt_mar', registered.credit = '$credit'"; 
        mysqli_query($connection, $update_query);
        header('Location: ../credit.php?siker=true');
        }

      
    }
} else {
     header('Location: ../credit.php?error=true');
}
}
