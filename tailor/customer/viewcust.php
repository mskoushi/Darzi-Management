<!DOCTYPE html>
<html>
<head>
  <title>Display Customer records from Database</title>
</head>
<body>

<h2>Customer Details</h2>

<table border="2">
 

<?php

session_start(); 


include "../config.php"; // Using database connection file here

// $records = mysqli_query($conn,"select * from customer where c_email_id = '$email' "); // fetch data from database
$email=$_SESSION['email'];
$query = "SELECT * FROM  customer WHERE c_email_id ='$email' ";
$i = 0;
$results = mysqli_query($conn, $query);
while($data = mysqli_fetch_array($results))
{
?>

<tr>
    <td>Customer ID</td>
    <td>Name</td>
    <td>Email</td>
    <td>Gender</td>
    <td>Age</td>
    <td>Phone Number</td>
    <td>Address</td>
    
  </tr>
  <tr>
    <td><?php echo $data['c_id']; ?></td>
    <td><?php echo $data['c_name']; ?></td>
    <td><?php echo $data['c_email_id']; ?></td>
    <td><?php echo $data['c_gender']; ?></td>
    <td><?php echo $data['c_age']; ?></td>
    <td><?php echo $data['c_pno']; ?></td>
    <td><?php echo $data['c_address']; ?></td>
  </tr>	
<?php
$i++;
}

if($i== 0)
{
  ?>
  
  <td><a href= "addcust.php?email=<?php echo $_SESSION['email'];  ?>" ><?php echo "First You Enter Your Details"; ?> </a> </td>
  
  <?php
}

?>
</table>

<?php mysqli_close($conn); // Close connection ?>

</body>
</html>