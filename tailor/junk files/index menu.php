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
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
</head>
<body>

<?php // if (isset($_SESSION['email'])) :?>
    	<p>Welcome <strong><?php // echo $_SESSION['email']; ?></strong></p>
<div class="menu text-center">
           <div class="wrapper">
           <ul>
               <li>
                   <a href="menu.php">Home</a>
               </li>
               
               <li>
                   <a href="addcust.php?email=<?php echo $_SESSION['email']; ?>">Category</a>
               </li>
               <li>
                   <a href="viewcust.php">View Your Details</a>
               </li>
               <li>
                   <a href="vieworder.php?email=<?php echo $_SESSION['email']; ?>" >View Order</a>
               </li>
               <li>
                   <a href="menu.php?logout='1'">Logout</a>
               </li>
           </ul>
           </div>
       </div>