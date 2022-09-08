


   <?php 


include_once '../config.php';
$email = $_GET['email'];
$result = mysqli_query($conn,"SELECT * FROM customer c ,`order` o WHERE o.c_id = c.c_id and c.c_email_id= '$email'  ");
 while ($row= mysqli_fetch_array($result);
?>
 <?php // echo $row['c.c_gender']; br; ?>
  <?php echo $row['o_id'];  ?>
  <?php  echo $_GET['email'] ?>



      