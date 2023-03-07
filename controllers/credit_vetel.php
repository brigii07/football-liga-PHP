<?php require_once('database.php');
 session_start(); 

if(isset($_SESSION['user']))
{
    $felhasznaloemail = $_SESSION['user']['email'];
    $vasarlas = $_SESSION['user']['credit_vetel'] +1;
    $fel_id = $_SESSION['user']['id'];
    $osszcredit = $_SESSION['user']['credit'] + 500;
if (isset($_POST['submit'])) {
   
    $valasz = mysqli_real_escape_string($connection, $_POST['valasz']);
    $email = mysqli_real_escape_string($connection, $felhasznaloemail);
    $vasarolt_mar = mysqli_real_escape_string($connection, $vasarlas);
    $felhasznalo_id = mysqli_real_escape_string($connection, $fel_id);
    $credit = mysqli_real_escape_string($connection, $osszcredit);

    $check_query = "SELECT * FROM registered WHERE email = '$email'";
    $result = mysqli_query($connection, $check_query);

    $query = "INSERT INTO `valaszok`(`valasz`, `vasarolt_mar`, `felhasznaloiId`) VALUES (?,?,?);";
    $statement = mysqli_stmt_init($connection);

    if (empty($valasz)) {
        echo 'Nem válaszoltál a kérdésre, így nem igényelhetsz creditet.';
    } elseif ($vasarolt_mar == 3) {
        echo 'Már nem igényelhetsz többször creditet.';
    } else {

        if (mysqli_stmt_prepare($statement, $query) == false) {
            echo 'Az inicializálás nem működik.';
        } else {
            mysqli_stmt_bind_param($statement, 'sss', $valasz, $vasarolt_mar, $felhasznalo_id);
            mysqli_stmt_execute($statement);
             $update_query = "UPDATE registered INNER JOIN valaszok ON valaszok.felhasznaloiId = registered.id  
        SET registered.credit_vetel = '$vasarolt_mar', registered.credit = '$credit'"; 
        mysqli_query($connection, $update_query);
        }

        header('Location: ../user.php');
    }
} else {
    /* header('Location: ../credit.php'); */
    echo 'A Credit igénylési kérését nem tudtuk teljesíteni.';
}
}
/* session_destroy(); */
?>
