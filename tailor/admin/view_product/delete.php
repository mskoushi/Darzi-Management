 <?php

include '../../config.php';

$id = $_GET['p_id'];

$q = " DELETE FROM `product` WHERE p_id = $id ";

mysqli_query($conn, $q);

header('location:display.php');

?>