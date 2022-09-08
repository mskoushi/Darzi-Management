<?php 
  include_once '../partials/header1.php';
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'tailor');
  
include 'errors.php';
// REGISTER USER
if (isset($_POST['add_order'])) {
  // receive all input values from the form
 
  $p_id = mysqli_real_escape_string($db, $_POST['pid']);
  $c_id = mysqli_real_escape_string($db, $_POST['cid']);
  $m_id = mysqli_real_escape_string($db, $_POST['mid']);
  $t_id = mysqli_real_escape_string($db, $_POST['tid']);
  $odate = mysqli_real_escape_string($db, $_POST['odate']);
  $oprice = mysqli_real_escape_string($db, $_POST['oprice']);
  $ddate = mysqli_real_escape_string($db, $_POST['ddate']);
  

  
  if (empty($p_id)) { array_push($errors, "Select Product "); }
  if (empty($c_id)) { array_push($errors, "Select Customer"); }
  if (empty($m_id)) { array_push($errors, "Select Measurement"); }
  if (empty($t_id)) { array_push($errors, "Select Tailor"); }
  if (empty($odate)) { array_push($errors, "Select Order Date"); }
  if (empty($ddate)) { array_push($errors, "Select Return Date"); }

  
  if (count($errors) == 0) {
     $query = " INSERT INTO `order` (`c_id`, `p_id`, `t_id`, `m_id`, `o_date`, `o_price`, `dispatch_date`) VALUES ('$c_id','$p_id','$t_id','$m_id',DATE('$odate'),'$oprice',DATE('$ddate')); ";
     $_SESSION['success'] = "Successfully Order Placed";
  	mysqli_query($db, $query);
  //	$status = "New Record Inserted Successfully . </br></br><a href='addtailor.php'>View Inserted Record</a>";
  }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html>
<style>
body {
  font-family: Arial;
  width: 75% ;
  margin: auto;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.head {
 text-align: center;
 }
 .error {
    width: 92%; 
    margin: 0px auto; 
    padding: 10px; 
    border: 1px solid #a94442; 
    color: #a94442; 
    background: #f2dede; 
    border-radius: 5px; 
    text-align: left;
  }
 
</style>
<body>
<div class="head">
<h3>ORDER </h3>
<?php include('errors.php'); ?>
<p>Enter Order Details</p>
</div>
<div class="container">
  <form method="post" action="addorder.php">

    <label for="cid">Customer ID</label>
    
    <select id="cid" name="cid" placeholder="Enter Customer Id">
    <option disabled selected>-- Select Customer by ID --</option>
    <?php
        include "config.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT c_id,c_name From customer");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['c_id'] ."'>" .$data['c_id'] ." - " .$data['c_name'] ." </option>";  // displaying data in option menu
        }	
    ?>  
  </select>
    

    <label for="pid">Product ID</label>
    
    <select id="pid" name="pid" placeholder="Enter Product Id">
    <option disabled selected>-- Select Product By ID --</option>
    <?php
        include "config.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT p_id,p_name From product");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['p_id'] ."'>" .$data['p_id'] ." - " .$data['p_name'] ." </option>";  // displaying data in option menu
        }	
    ?>  
  </select>

    <label for="tid">Tailor ID</label>
    
    <select id="tid" name="tid" placeholder="Enter Tailor Id">
    <option disabled selected>-- Select Tailor By ID --</option>
    <?php
        include "config.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT t_id ,t_name From tailor");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['t_id'] ."'>" .$data['t_id'] ."- " .$data['t_name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>

    <label for="mid">Measurement ID</label>
    
    <select id="mid" name="mid" placeholder="Enter Measurement Id">
    <option disabled selected>-- Select Measurement By ID --</option>
    <?php
        include "config.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT m_id,c.c_id as id,c_name From measurement m,customer c WHERE c.c_id = m.c_id ");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['m_id'] ."'>" .$data['m_id'] ." of  " .$data['c_name'] ."-  " .$data['id'] ."</option>";  // displaying data in option menu
            
          }	
       
    ?>  
  </select>

    <label for="oprice">Order Price </label>
    <input type="text" id="oprice" name="oprice" placeholder="Enter Order Price">

   <p> <label for="odate">Order Date</label>
    <br>
    <input type="date" id="odate" name="odate" placeholder="Enter Order Date">
    <br><br>
    
    
    <label for="ddate">Dispatch Rate</label>
    <br>
    <input type="date" id="ddate" name="ddate" placeholder="Enter Return Date">
    
    <input type="submit" name="add_order" action="Submit" onSubmit="alert('Thank you!');" >
  </form>

</div>

</body>
</html>

</body>
</html>