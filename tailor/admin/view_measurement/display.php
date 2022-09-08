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
 <h1 class="text-warning text-center" > Measurement Details Table  </h1>
 <form method="post" action="display.php">
    <label for="">Search By Measurement ID</label>
    <input type="number" id="mid" name="mid" placeholder="Enter Measurement  ID">
    <input type="submit" name="search_measurement" value="Submit">

 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th>Measurement ID</th>
<th>Product ID</th>
<th>Customer ID</th>
<th>Neck</th>
<th>Shoulder</th>
<th>Chest</th>
<th>Abs</th>
<th>Waist</th>
<th>Hand</th>
<th>Body</th>
<th>Leg</th>

<th>Delete</th>
<th>Update</th>


       

 </tr >

 <?php

 include '../../config.php'; 
 if (isset($_POST['search_measurement'])) {
  $mid = mysqli_real_escape_string($conn, $_POST['mid']);

 $q = "select * from measurement WHERE m_id = $mid ";
 }
 else{
 $q = "select * from measurement ";
  }

 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['m_id'];  ?> </td>
 <td> <?php echo $res['p_id'];  ?> </td>
 <td> <?php echo $res['c_id'];  ?> </td>

 <td> <?php echo $res['neck'];  ?> </td>
 <td> <?php echo $res['shoulder'];  ?> </td>
 <td> <?php echo $res['chest'];  ?> </td>
 <td> <?php echo $res['abs'];  ?> </td>
 <td> <?php echo $res['waist'];  ?> </td>
 <td> <?php echo $res['hand'];  ?> </td>
 <td> <?php echo $res['body'];  ?> </td>
 <td> <?php echo $res['leg'];  ?> </td>




 
 <td> <button class="btn-danger btn"> <a href="delete.php?m_id=<?php echo $res['m_id']; ?>" class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn-primary btn"> <a href="update.php?m_id=<?php echo $res['m_id']; ?>" class="text-white"> Update </a> </button> </td>

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