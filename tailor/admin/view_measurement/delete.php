<?php

include '../../config.php';

$id = $_GET['m_id'];

$q = " DELETE FROM `measurement` WHERE m_id = $id ";
if ($q == 0)
{
    echo "Empty";
}
mysqli_query($conn, $q);

header('location:display.php');

?>