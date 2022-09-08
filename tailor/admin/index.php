<?php 
include '../config.php';
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  $q = "select count(*) as cno from customer";
  $r = "select count(*) as ono from `order`";
  $s = "select sum(o_price) as tprice from `order`";
  $t = "select count(*) as tno from tailor";

  $query = mysqli_query($conn,$q);
  $query1 = mysqli_query($conn,$r);
  $query2 = mysqli_query($conn,$s);
  $query3 = mysqli_query($conn,$t);

  $res = mysqli_fetch_array($query);
  $res1 = mysqli_fetch_array($query1);
  $res2 = mysqli_fetch_array($query2);
  $res3 = mysqli_fetch_array($query3);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;
      background: linear-gradient( rgba(100,0,0,1.0)),url(bg.jpg); 
      
 }

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #5F9EA0;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 300px;
}

<-- verical menu -->

.vertical-menu {
  width: 200px; /* Set a width if you like */
}

.vertical-menu a {
  background-color: #eee; /* Grey background color */
  color: black; /* Black text color */
  display: block; /* Make the links appear below each other */
  padding: 12px; /* Add some padding */
  text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
  background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
  background-color: #04AA6D; /* Add a green color to the "active/current" link */
  color: white;
}
Vertical Scroll Menu
Set a specific height and add the overflow property if you want a vertical scroll menu:

Example
.vertical-menu {
  width: 200px;
  height: 150px;
  overflow-y: auto;
}
.header{
  background-color: brown;
  float: center;
  width: 100%;
  height: 150px;

  padding: 30spx;
  align :left;
}
</style>
</head>
<body>
	<!-- notification message -->
  	<!-- <?php// if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
        <?php 
          	//echo $_SESSION['success']; 
          	//unset($_SESSION['success']);
          ?>
      	</h3>
	  </div>
  	<?php //endif ?> -->
    <!-- logged in user information -->
    <?php // include_once '..\partials\header.php'; ?>
    <?php  if (isset($_SESSION['username'])) : ?>
      <div class= "header" ><p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p> 
      <p style="position:absolute;top:25%;right:5;"> <a class = "btn btn-md btn-danger" href="index.php?logout='1'" >LOGOUT</a> </p>
    <!-- <  <a href="index.php?logout='1' " style="color: red;"><strong>LOGOUT</strong></a>  -->
      <h1 text-align : center>Admin Panel</h1>
      <p></p>
      </div>
   <br>
  
   
<div class="tab">
<button class="tablinks" onclick="openCity(event, 'HOME')" id="defaultOpen">HOME</button>
  <button class="tablinks" onclick="openCity(event, 'Customer')" id="defaultOpen">Customer</button>
  <button class="tablinks" onclick="openCity(event, 'Measurement')">Measurement</button>
  <button class="tablinks" onclick="openCity(event, 'Product')">Product</button>
   <button class="tablinks" onclick="openCity(event, 'Order')">Orders</button>
    <button class="tablinks" onclick="openCity(event, 'Tailor')">Tailor</button>
    </div>

<div href="#" id="HOME" class="tabcontent"> 

<div class="container">
    <div class="row">
      <div class="col-md-12">
          <h3 class="mt-5 font-weight-bold text-center">STATISTICS</h3>
      </div>
    </div>
    <div class="row mt-3 pt-3" style="background-color: #eeeeee">
      <div class="col-md-6">
        <!-- Card group -->
        <div class="card-group">

          <!-- Card -->
          <div class="card mb-4">

            <!-- Card content -->
            <div class="card-body">

              <!-- Title -->
              <h6 class="card-title">Total Customer:</h6>
              <!-- Text -->
              
              
              <p class="card-text blue-text"><i class="fas fa-thumbs-up fa-2x"></i><span class="ml-2" style="font-size: 30px;"><?php echo $res['cno'];?></p>

            </div>
            <!-- Card content -->

          </div>
          <!-- Card -->

          <!-- Card -->
          <div class="card mb-4">

            <!-- Card content -->
            <div class="card-body">
              <!-- Title -->
              <h6 class="card-title">Total Orders: </h6>
              <!-- Text -->
              <p class="card-text red-text"><i class="fas fa-thumbs-down fa-2x"></i></i><span class="ml-2" style="font-size: 30px;"><?php echo $res1['ono'];?></p>
            </div>
            <!-- Card content -->

          </div>
          <!-- Card -->

        </div>
        <!-- Card group -->
      </div>

      
    <br>
      <div class="col-md-6">
          <!-- Card group -->
          <div class="card-group">
  
            <!-- Card -->
            <div class="card mb-4">
  
              <!-- Card content -->
              <div class="card-body">
  
                <!-- Title -->
                <h6 class="card-title">Total Earnings:</h6>
                <!-- Text -->
                
                
                <p class="card-text green-text"><i class="fas fa-angle-double-up fa-2x"></i><span class="ml-2" style="font-size: 30px;"><?php echo $res2['tprice'];?></p>
  
              </div>
              <!-- Card content -->
  
            </div>
            <!-- Card -->
  
            <!-- Card -->
            <div class="card mb-4">
  
              <!-- Card content -->
              <div class="card-body">
                <!-- Title -->
                <h6 class="card-title">Number of Tailors: </h6>
                <!-- Text -->
                <p class="card-text red-text"><i class="fas fa-angle-double-down fa-2x"></i><span class="ml-2" style="font-size: 30px;"><?php echo $res3['tno'];?></p>
              </div>
              <!-- Card content -->
  
            </div>
            <!-- Card -->
  
          </div>
          <!-- Card group -->
        </div>
    </div>
  </div>
</div>


<div class="vertical-menu">
    </div>
<div id="Customer" class="tabcontent">
  <h3></h3>
  <div class="vertical-menu">
  <a href="#" class="active">Home</a>
  <a href="addcustomer.php">Add Customer</a>
  <a href="view_customer/display.php">Update Cutomer Details</a>
  <a href="view_customer/display.php">Delete Customer</a>
</div>
</div>

<div id="Measurement" class="tabcontent">
  
  <div class="vertical-menu">
  <a href="#" class="active">Home</a>
  <a href="addmeasurement.php">Add Measurement</a>
  <a href="view_measurement/display.php">Update Measurement</a>
</div>
</div>

<div id="Product" class="tabcontent">
  <div class="vertical-menu">
  <a href="#" class="active">Home</a>
  <a href="addproduct.php">Add Product</a>
  <a href="view_product/display.php">Update Product</a>
  <a href="view_product/display.php">Delete Product</a>
</div>
</div>

<div id="Tailor" class="tabcontent">
  <div class="vertical-menu">
  <a href="#" class="active">Home</a>
  <a href="addtailor.php">Add Tailor</a>
  <a href="view_tailor/display.php">Update Tailor</a>
  <a href="view_tailor/display.php">Delete Tailor</a>
</div>
</div>

<div id="Order" class="tabcontent">
  <div class="vertical-menu">
  <a href="#" class="active">Home</a>
  <a href="addorder.php">Add Order</a>
  <a href="view_order/display.php">View Order</a>
  <a href="view_order/display.php">Delete Order</a>
</div>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
    <?php endif ?>
</div>

</body>
</html>