<?php 
  session_start(); 

 
  if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['email']);
	header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Customer Homepage</title>
	<!-- <link rel="stylesheet" type="text/css" href="styles1.css"> -->
	<!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style = " background-image: url(../image/bg.jpg)" > 

<div >
	<h2 style ="text-align:center" >Home Page</h2>
  </div> 
    <div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['email'])) :?>

    	<div style="color :green;" > <p>Welcome <strong><?php echo $_SESSION['email']; ?></strong> </p> </div> 
		<p style="position:absolute;top:5%;right:0;"> <a class = "btn btn-md btn-danger" href="index.php?logout='1'" >logout</a> </p>
	
		<!-- <p> <a href="viewcust.php" style="color: red;">View Details</a> </p>
        <p> <a href="vieworder.php?email=<?php echo $_SESSION['email']; ?>" style="color: red;">View Your Order</a> </p>
		
		<p> <a href="addcust.php?email=<?php echo $_SESSION['email']; ?>" style="color: red;" > Add your Details </a> </p> -->
        
	   <!-- <a href="viewcust.php" class="text-decoration-none">	<div class="card" style="width: 18rem;">
        <img src="../image/bg.jpg" class="card-img-top" >
       <div class="card-body">
       <p class="card-text"  class="text-center" >View Your Details</p> 
  </div> </a> -->


 
</div>
<div style="display:flex; margin-left:15%;margin-top:5%;">
<div class="card-group text-center">
<a href="viewcust.php" class="text-decoration-none">  
<div class="card">
    <img src="https://img.icons8.com/ios-filled/500/000000/view-details.png" width="300px" height="300px"  class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">View Your Detail</h5>
     
    </div>
  </div>
  </a>
  <a href="addcust.php?email=<?php echo $_SESSION['email']; ?>" class="text-decoration-none">
  <div class="card">
    <img src="https://img.icons8.com/ios/500/000000/add-property.png" width="300px" height="300px" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Add Your Detail</h5>
      
    </div>
  </div>
  </a>
  <a href="vieworder.php?email=<?php echo $_SESSION['email']; ?>" class="text-decoration-none">
  <div class="card">
    <img src="https://img.icons8.com/ios-filled/500/000000/mobile-order.png"  width="300px" height="300px"  class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">View Orders</h5>
    
    </div>
  </div>
	</a>
</div>
</div>
		
    <?php endif ?>
</div>

		
</body>
</html>