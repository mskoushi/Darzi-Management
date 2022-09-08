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
 <h1 class="text-warning text-center" > Tailor Details Table  </h1>
 <form method="post" action="display.php">
    <label for="">Search By Tailor ID</label>
    <input type="number" id="tid" name="tid" placeholder="Enter Tailor ID">
    <input type="submit" name="search_tailor" value="Submit">

 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th>Tailor ID</th>
<th>Name</th>
<th>Email</th>
<th>Age</th>
<th>Gender</th>       
<th>Phone Number</th>
<th>Address</th>
<th>Experience</th>
<th>Rating</th>
<th>Delete</th>
<th>Update</th>

       

 </tr >

 <?php

 include '../../config.php'; 

 if (isset($_POST['search_tailor'])) {
  $tid = mysqli_real_escape_string($conn, $_POST['tid']);

 $q = "select * from tailor WHERE t_id = $tid ";
 }
 else{
 $q = "select * from tailor ";
  }

 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['t_id'];  ?> </td>
 <td> <?php echo $res['t_name'];  ?> </td>
 <td> <?php echo $res['t_email_id'];  ?> </td>
 <td> <?php echo $res['t_age'];  ?> </td>
 <td> <?php echo $res['t_gender'];  ?> </td>
 <td> <?php echo $res['t_pno'];  ?> </td>
 <td> <?php echo $res['t_address'];  ?> </td>
 <td> <?php echo $res['t_experience'];  ?> </td>
 <td> <?php echo $res['t_rating'];  ?> </td>

 
 <td> <button class="btn-danger btn"> <a href="delete.php?t_id=<?php echo $res['t_id']; ?>" class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn-primary btn"> <a href="update.php?t_id=<?php echo $res['t_id']; ?>" class="text-white"> Update </a> </button> </td>

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