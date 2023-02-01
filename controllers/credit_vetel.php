<?php require_once('database.php');

$serverAddress = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'football_projekt';

$connection = mysqli_connect($serverAddress, $username, $password, $databaseName);

if (isset($_POST['submit'])) {
    $leadas = mysqli_real_escape_string($connection, $_POST['leadas']);
    $email = mysqli_real_escape_string($connection, $_SESSION['user']['email']);
    $vasarolt_mar = mysqli_real_escape_string($connection, $_SESSION['user']['credit_vetel'] + 1);
    $felhasznalo_id = mysqli_real_escape_string($connection, $_SESSION['user']['id']);
    $credit = mysqli_real_escape_string($connection, $_SESSION['user']['credit'] + 500);

    $check_query = "SELECT * FROM registered WHERE email = '$email'";
    $result = mysqli_query($connection, $check_query);

    $query = "INSERT INTO `valaszok`(`valasz`, `vasarolt_mar`, `felhasznaloiId`) VALUES (?,?,?);";
    $statement = mysqli_stmt_init($connection);

    if (empty($leadas)) {
        echo 'Nem válaszoltál a kérdésre, így nem igényelhetsz creditet.';
    } /* elseif ($vasarolt_mar == 3) {
        echo 'Már nem igényelhetsz többször creditet.';
    } */ else {

        if (mysqli_stmt_prepare($statement, $query) == false) {
            echo 'Az inicializálás nem működik.';
        } else {
            mysqli_stmt_bind_param($statement, 'sss', $leadas, $vasarolt_mar, $felhasznalo_id);
            mysqli_stmt_execute($statement);
        /* $update_query = "UPDATE registered INNER JOIN valaszok ON valaszok.felhasznaloiId = registered.id  
        SET registered.credit_vetel = $vasarolt_mar, registered.credit = $credit";  */
        }

        header('Location: ../user.php');
        /* echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Siker!</strong> A credit igénylése sikeres volt. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>'; */
    }
} else {
    /* header('Location: ../credit.php'); */
       echo 'A Credit igénylési kérését nem tudtuk teljesíteni.' ;
}
