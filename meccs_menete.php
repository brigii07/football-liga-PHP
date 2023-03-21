<?php require_once('header.php'); ?>
<?php require_once('controllers/database.php'); ?>
<?php include_once('controllers/lejatszas.php'); ?>


<div class="row">
    <div class="col-12 text-center" id="focim">
        <h1><?php echo  $hazai_csapat . " vs " .  $idegen_csapat ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <div class="card text-center">
            <h1>Játék eseményei</h1>
            <ul class="list-group list-group-flush">

                <?php
                foreach ($esemenyek as $key => $value) {
                    echo '<li class="list-group-item">' . $value . '</li>';
                }
                ?>
                <li class="list-group-item">A meccs véget ért</li>
                <?php
                echo '<li class="list-group-item"> A végeredmény: <b>' . $hazai_score . ' - ' . $idegen_score . '</b></li>';
            ?>
            </ul>

        </div>
    </div>
    <div class="col-3"></div>
</div>
<?php require_once('footer.php'); ?>