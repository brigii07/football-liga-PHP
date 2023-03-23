<?php require_once 'header.php';
require 'controllers/database.php';
?>

<?php

$query = "SELECT * FROM csapat_parositas WHERE idopont IS NOT NULL";
$result = mysqli_query($connection, $query);
?>

<div class="row mt-4">
    <div class="col-3"></div>
    <div class="col-6">

        <div class="card border-primary">
            <div class="card-body">
                <h4 class="card-title">Szimulált meccsek</h4>

                <form action="szimulalt_eredmenyek.php" method="POST">
                    <select name="meccs" id="meccs" class="form-control">
                        <option value="-1" disabled selected>Kérem válasszon...</option>

                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['id'] . '">' . $row['hazai_csapat'] . ' - ' . $row['idegen_csapat'] . '</option>';
                        }
                        ?>

                    </select>
                    <div class="text-center mt-3">
                       <button class="btn btn-dark" name="submit" id="submit">Részletek</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-3"></div>

</div>
<!-- Kész -->
<?php require_once 'footer.php'; ?>