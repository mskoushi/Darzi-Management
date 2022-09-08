<?php

include '../../config.php';

$id = $_GET['o_id'];

$q = " DELETE FROM `order` WHERE o_id = $id ";

mysqli_query($conn, $q);

header('location:display.php');

?>