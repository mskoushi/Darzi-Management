<?php
include 'config.php';
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 



$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Product Id: " . $row["p_id"]. "-- Product Name: " . $row["p_name"] ."  - -Product Category: " .$row["p_category"]. "  - -Product Price: " .$row["p_price"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>