<?php require_once('header.php'); ?>
<?php require_once('controllers/database.php'); ?>
<?php include_once('controllers/lejatszas.php'); ?>

<?php 

/* 
if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $query = "SELECT hazai_idegen_cs, id FROM meccs_lejatszas WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
} */

/* $csapatok = array();
while ($row = mysqli_fetch_assoc($result)) {
    $csapat = array('id' => $row['id'], 'name' => $row['hazai_idegen_cs']);
    array_push($csapatok, $csapat);
} */

?>
<!-- 
<div class="row">
    <div class="col-12 text-center" id="focim">
        <h1><?php echo $csapatok[0]['name'] . " vs " . $csapatok[1]['name'] ?></h1>
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
                <li class="list-group-item">A meccs véget ért</li> -->
                <?php
/*                 echo '<li class="list-group-item"> A végeredmény: ' . $GLOBALS['team_1_score'] . ' - ' . $GLOBALS['team_2_score'] . '</li>';
 */                ?>
<!--             </ul>

        </div>
    </div>
    <div class="col-3"></div>
</div> -->
<?php require_once('footer.php'); ?>