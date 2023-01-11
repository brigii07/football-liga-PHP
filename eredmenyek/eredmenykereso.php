<?php require_once('C:\xampp\htdocs\bridge\projekt\football-liga\football-liga-nyersphp-\header.php') ?>

<?php
include 'C:\xampp\htdocs\bridge\projekt\football-liga\football-liga-nyersphp-\controllers\database.php';
$error = '';
$adatok = '';
if (isset($_POST['kereso'])) {
    if (!empty($_POST['keres'])) {
        $kereses = $_POST['keres'];
        $stmt = $con->prepare("SELECT * FROM eredmenyek WHERE hazai LIKE '%$kereses%' OR idegen LIKE '%$kereses%' OR vegeredmeny LIKE '%$kereses%' OR idopont LIKE '%$kereses%'");
        $stmt->execute();
        $adatok = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $error = "Nem töltötted ki a keresőmezőt.";
    }
}

?>

<form action="eredmenyek\eredmenykereso.php" method="POST">
            <input type="text" name="keres" id="keres" placeholder="Keresés...">
            <button type="submit" id="kereso" name="kereso">Keresés</button>
        </form>
        
    <div class="container">
        <br /><br />
        <form class="form-horizontal" action="#" method="post">
            <div class="row">
                <div class="form-group">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="search" placeholder="search here">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" name="save" class="btn btn-success btn-sm">Submit</button>
                    </div>
                </div>
                <div class="form-group">
                    <span class="error" style="color:red;">* <?php echo $error; ?></span>
                </div>

            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-dark text-center">
                <thead>
                    <tr>
                        <th scope="col">Hazai Csapat</th>
                        <th scope="col">Vendég Csapat</th>
                        <th scope="col">Végeredmény</th>
                        <th scope="col">Időpont</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!$adatok) {
                        echo '<tr>Nem találtam ilyen adatot.</tr>';
                    } else {
                        foreach ($adatok as $kulcs => $ertek) {
                    ?>
                            <tr class="table-light">
                                <th scope="row"><?php echo $kulcs + 1; ?></th>
                                <th scope="row"><?php echo $ertek['hazai']; ?></th>
                                <th scope="row"><?php echo $ertek['idegen']; ?></th>
                                <th scope="row"><?php echo $ertek['vegeredmeny']; ?></th>
                                <th scope="row"><?php echo $ertek['idopont']; ?></th>
                            </tr>

                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <?php require_once('C:\xampp\htdocs\bridge\projekt\football-liga\football-liga-nyersphp-\footer.php') ?>