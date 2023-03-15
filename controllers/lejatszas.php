<?php
require_once('database.php');

if (isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $query = "SELECT hazai_idegen_cs, id FROM meccs_lejatszas WHERE id = '$id'";
    $result = mysqli_query($connection, $query);


}

