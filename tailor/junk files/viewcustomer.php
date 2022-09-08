<!DOCTYPE html>
<html>
<head>
  <title>Display Customer records from Database</title>
</head>
<body>

<h2>Customer Details</h2>

<table border="2">
  <tr>
    <td>Customer ID</td>
    <td>Name</td>
    <td>Email</td>
    <td>Gender</td>
    <td>Age</td>
    <td>Phone Number</td>
    <td>Address</td>
    
  </tr>

<?php

include "dbconn.php"; // Using database connection file here

$records = mysqli_query($db,"select * from customer"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['c_id']; ?></td>
    <td><?php echo $data['c_name']; ?></td>
    <td><?php echo $data['c_email_id']; ?></td>
    <td><?php echo $data['c_age']; ?></td>
    <td><?php echo $data['c_gender']; ?></td>
    <td><?php echo $data['c_pno']; ?></td>
    <td><?php echo $data['c_address']; ?></td>
  </tr>	
<?php
}
?>
</table>

<?php mysqli_close($db); // Close connection ?>

</body>
</html>

