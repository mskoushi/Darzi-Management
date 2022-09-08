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
 <h1 class="text-warning text-center" > Order Details Table  </h1>
 <form method="post" action="display.php">
    <label for="">Search By Order ID</label>
    <input type="number" id="oid" name="oid" placeholder="Enter Order ID">
    <input type="submit" name="search_order" value="Submit">

 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
<th>Order ID</th>
<th>Customer ID</th>
<th>Product ID</th>
<th>Tailor ID</th>
<th>M ID</th>       
<th>Order Date</th>
<th>Price</th>
<th>Dispatch Date</th>
<th>Delete</th>
<th>Update</th>
<th>Invoice</th>

       

 </tr >

 <?php

 include '../../config.php'; 
 if (isset($_POST['search_order'])) {
  $oid = mysqli_real_escape_string($conn, $_POST['oid']);

 $q = "select * from `order` WHERE o_id = $oid ";
 }
 else{
 $q = "select * from `order` ";
  }
 

 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['o_id'];  ?> </td>
 <td> <?php echo $res['c_id'];  ?> </td>
 <td> <?php echo $res['p_id'];  ?> </td>
 <td> <?php echo $res['t_id'];  ?> </td>
 <td> <?php echo $res['m_id'];  ?> </td>
 <td> <?php echo $res['o_date'];  ?> </td>
 <td> <?php echo $res['o_price'];  ?> </td>
 <td> <?php echo $res['dispatch_date'];  ?> </td>
 
 <td> <button class="btn-danger btn"> <a href="delete.php?o_id=<?php echo $res['o_id']; ?>" class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn-primary btn"> <a href="update.php?o_id=<?php echo $res['o_id']; ?>" class="text-white"> Update </a> </button> </td>
 <td> <button class="btn-primary btn"> <a href="invoice.php?o_id=<?php echo $res['o_id']; ?>" class="text-white"> Invoice </a> </button> </td>

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