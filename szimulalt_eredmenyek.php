<?php require_once 'header.php';
require 'controllers/database.php'; 
?>

<?php
if (isset($_POST['submit'])) {

    $meccs_id = mysqli_real_escape_string($connection, $_POST['meccs']);

    $sql = "SELECT * FROM `meccs_lejatszas` WHERE meccsid =" . $_POST['meccs'];
    $result = mysqli_query($connection, $sql);

    $parositas = "SELECT * FROM csapat_parositas WHERE id = " . $meccs_id;
    $result2 = mysqli_query($connection, $parositas);
    $adatok = mysqli_fetch_assoc($result2);
} else {
    echo "Valami hiba történt, kérlek próbáld újra.";
}
?>

<?php

    /* Meccs és a hozzá tartozó fogadás lekérése */
    $fogadasLekeresQuery = "SELECT * FROM fogadas WHERE meccsId = $meccs_id";
    global $fogadasAdatok;
    $fogadasAdatok = mysqli_fetch_assoc(mysqli_query($connection, $fogadasLekeresQuery));
    global $nyeremenyData;
/*     $nyeremenyData = array("nyeremeny" => "Erre a meccsre nem fogadtál");
 */
    if (isset($fogadasAdatok['id'])) {
       global $meccs_nyeremeny_query;
       $meccs_nyeremeny_query = "SELECT * FROM nyeremeny WHERE felhasznaloId = ". $_SESSION['user']['id'] . " AND fogadasId = " . $fogadasAdatok['id'];     
        $nyeremenyData = mysqli_fetch_assoc(mysqli_query($connection, $meccs_nyeremeny_query));
    }

    if($nyeremenyData > 1)
   {
    global $kiir;
    $kiir = "Az Ön nyereménye: " . $nyeremenyData['nyeremeny'] . " CR";
   }
   else
   {
    $kiir = "Ön nem fogadott erre a meccsre";
   }
      


?>

<div class="row mt-4">
    <div class="col-2"></div>
    <div class="col-8">
        <table class="table table-bordered table-hover table-dark text-center">
            <thead>
                <th>Hazai csapat</th>
                <th>Eredmény</th>
                <th>Idegen csapat</th>
            </thead>
            <tbody>
                <tr>
                    <?php
                    echo "<td style='width: 33%'>" . $adatok['hazai_csapat'] . "</td>";
                    echo "<td style='width: 33%'>" . $adatok['eredmeny_hazai'] . " - " . $adatok['eredmeny_idegen'] . "</td>";
                    echo "<td style='width: 33%'>" . $adatok['idegen_csapat'] . "</td>";
                    ?>
                </tr>
                <tr>
                    <td style='width: 33%'></td>
                    <td style='width: 33%'><?php echo $adatok['idopont']; ?></td>
                    <td style='width: 33%'></td>
                </tr>
                <tr>
                    <td style='width: 33%'></td>
                    <td class="text-danger" style='width: 33%'><?php echo $kiir ?></td>
                    <td style='width: 33%'></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-2"></div>
</div>

<div class="row mt-4">
    <div class="col-2"></div>
    <div class="col-8">
        <table class="table table-bordered table-hover table-dark text-center">
            <thead>
                <tr>
                    <th scope="col">Események</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr class="table-light">
                                <td scope="row">' . $row['esemenyek'] . '</td>
                                </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-2"></div>
</div>
<!-- Kész -->
<?php require_once 'footer.php'; ?>