<?php
include_once '..\..\partials\header.php';
?>

<!DOCTYPE html>
<html>
<head>
 <title></title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>

 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Customer Details Table  </h1> 
 <form method="post" action="display.php">
    <label for="">Search By Cusomer ID</label>
    <input type="number" id="cid" name="cid" placeholder="Enter Customer ID">
    <input type="submit" name="search_customer" value="Submit">


 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th>Customer ID</th>
<th>Name</th>
<th>Email</th>
<th>Age</th>
<th>Gender</th>       
<th>Phone Number</th>
<th>Address</th>
<th>Delete</th>
<th>Update</th>

       

 </tr >

 <?php

 include '../../config.php'; 
 session_start();
 if (isset($_POST['search_customer'])) {
  $cid = mysqli_real_escape_string($conn, $_POST['cid']);

 $q = "select * from customer WHERE c_id = $cid ";
 }
 else{
 $q = "select * from customer ";
  }
 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['c_id'];  ?> </td>
 <td> <?php echo $res['c_name'];  ?> </td>
 <td> <?php echo $res['c_email_id'];  ?> </td>
 <td> <?php echo $res['c_age'];  ?> </td>
 <td> <?php echo $res['c_gender'];  ?> </td>
 <td> <?php echo $res['c_pno'];  ?> </td>
 <td> <?php echo $res['c_address'];  ?> </td>

 
 <td> <button class="btn-danger btn"> <a href="delete.php?c_id=<?php echo $res['c_id']; ?>" class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn-primary btn"> <a href="update.php?c_id=<?php echo $res['c_id']; ?>" class="text-white"> Update </a> </button> </td>

 </tr>

 <?php 

 }
  ?>
 
 </table>  

 </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>

</body>
</html>