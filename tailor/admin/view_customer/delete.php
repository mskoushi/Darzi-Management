<?php

include '../../config.php';

$id = $_GET['c_id'];

$q = " DELETE FROM `customer` WHERE c_id = $id ";

mysqli_query($conn, $q);

header('location:display.php');

?>