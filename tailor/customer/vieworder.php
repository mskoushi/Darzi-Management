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
 <h1 class="text-warning text-center" > Your  Order Details   </h1>
 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th>Order ID</th>
 <th> Stiched By </th>
<th>Order Date</th>
<th>Delivery Date</th>
<th> Invoice </th>


       

 </tr >

 <?php

 include '../config.php'; 

 $email = $_GET['email'];
 $query = mysqli_query($conn,"SELECT * FROM customer c ,`order` o ,tailor t WHERE o.c_id = c.c_id and c.c_email_id= '$email'  ");

 $i=0;
 while($res = mysqli_fetch_array($query)){
   $i++;
 ?>

 <tr class="text-center">
 <td> <?php echo $res['o_id'];  ?> </td>
 <td> <?php echo $res['t_name'];  ?> </td>
 <td> <?php echo $res['o_date'];  ?> </td>
 <td> <?php echo $res['dispatch_date'];  ?> </td>
 <td> <button class="btn-primary btn"> <a href="invoice.php?o_id=<?php echo $res['o_id']; ?>" class="text-white"> Invoice </a> </button> </td>


 

 </tr>

 <?php 

 
} 


  ?>
 
 </table>  
<?php 
if($i == 0) { 
 echo " <td> NO Order found </td>";
}
?>
 </div>
 </div>

 <script type="text/javascript">
 
 $(document).ready(function(){
 $('#tabledata').DataTable();
 }) 
 
 </script>

</body>
</html>