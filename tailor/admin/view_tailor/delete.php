<?php

include '../../config.php';

$id = $_GET['t_id'];

$q = " DELETE FROM `tailor` WHERE t_id = $id ";

mysqli_query($conn, $q);

header('location:display.php');

?>