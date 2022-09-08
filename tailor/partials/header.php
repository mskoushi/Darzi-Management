 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

.topnav {
  background-color: #333;
  overflow: hidden;
  width:100%;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 7px 53px;
  text-decoration: none;
  font-size: 17px;


}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

</style>
  
</head>
<body>
    <div class="topnav">
  <a class="active" href="../index.php">MAIN MENU</a>
  
  <a href="..\view_customer\display.php">Customer</a>
  <a href="..\view_measurement\display.php">Measurement</a>
  <a href="..\view_product\display.php">Product</a>
  <a href="..\view_order\display.php">Order</a>
  <a href="..\view_tailor\display.php">Tailor</a>
  <a href="/tailor">LOGOUT</a>

</div>
    
</body>
</html>

<?php
