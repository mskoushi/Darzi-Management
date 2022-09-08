<!DOCTYPE html>
<html>
<head>
  <title>PHP Retrieve Data from MySQL using Drop Down Menu</title>
</head>
<body>

<form>
  City:
  <select>
    <option disabled selected>-- Select City --</option>
    <?php
        include "config.php";  // Using database connection file here
        $records = mysqli_query($conn, "SELECT p_id From product");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['p_id'] ."'>" .$data['p_id'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>
</form>

<?php mysqli_close($conn);  // close connection ?>

</body>
</html>