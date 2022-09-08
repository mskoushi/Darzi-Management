<?php 
   include_once '../partials/header1.php';
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'tailor');

// Add mesurement
if (isset($_POST['add_measurement'])) {
  // receive all input values from the form
 
  $p_id = mysqli_real_escape_string($db, $_POST['pid']);
  $c_id = mysqli_real_escape_string($db, $_POST['cid']);
  $neck = mysqli_real_escape_string($db, $_POST['neck']);
  $shoulder = mysqli_real_escape_string($db, $_POST['shoulder']);
  $chest = mysqli_real_escape_string($db, $_POST['chest']);
  $abs = mysqli_real_escape_string($db, $_POST['abs']);
  $waist = mysqli_real_escape_string($db, $_POST['waist']);
  $hand = mysqli_real_escape_string($db, $_POST['hand']);
  $body = mysqli_real_escape_string($db, $_POST['body']);
  $leg = mysqli_real_escape_string($db, $_POST['leg']);

  
  if (empty($p_id)) { array_push($errors, "Select Product "); }
  if (empty($c_id)) { array_push($errors, "Select Customer"); }
  if (empty($neck)) { array_push($errors, "Enter Neck Length "); }
  if (empty($shoulder)) { array_push($errors, "Enter Shoulder Length "); }
  if (empty($chest)) { array_push($errors, "Enter Chest Length"); }
  if (empty($abs)) { array_push($errors, "Enter Abs Length"); }
  if (empty($waist)) { array_push($errors, "Enter WaistLength"); }
  if (empty($hand)) { array_push($errors, "Enter Hand Length"); }
  if (empty($body)) { array_push($errors, "Enter Body Length"); }
  if (empty($leg)) { array_push($errors, "Enter Leg Length"); }
  
  if (count($errors) == 0) {
     $query = " INSERT INTO `measurement` (`p_id`, `c_id`, `neck`, `shoulder`, `chest`, `abs`, `waist`, `hand`, `body`, `leg`) VALUES ('$p_id', '$c_id', '$neck', '$shoulder', '$chest', '$abs', '$waist', '$hand', '$body', '$leg'); ";
      
  	mysqli_query($db, $query);
    $_SESSION['success'] = "Successfully Measurement details Inserted";
  	header('location: index.php');
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
<h3>Measurement</h3>
<?php include('errors.php'); ?>
<?php include('errors.php'); ?>
<p>Enter Measurement Details</p>
</div>
<div class="container">
  <form method="post" action="addmeasurement.php">

    <label for="cid">Customer ID</label>
    
    <select id="cid" name="cid" placeholder="Enter Customer Id">
    <option disabled selected>-- Select Customer by ID --</option>
    <?php
        include "config.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT c_id ,c_name From customer");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['c_id'] ."'>" .$data['c_id'] ." - " .$data['c_name'] ."</option>";  // displaying data in option menu
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
            echo "<option value='". $data['p_id'] ."'>" .$data['p_id'] ." - " .$data['p_name'] ."</option>";  // displaying data in option menu
        }	
        
    ?>  
  </select>
    
    <label for="neck">Neck</label>
    <input type="text" id="neck" name="neck" placeholder="Enter Neck Measurement">
   
    <label for="shoulder">Shoulder</label>
    <input type="text" id="shoulder" name="shoulder" placeholder="Enter Shoulder Measurement">

    <label for="chest">Chest</label>
    <input type="text" id="chest" name="chest" placeholder="Enter Chest Measurement">
    
    <label for="abs">Abs</label>
    <input type="text" id="abs" name="abs" placeholder="Enter  Abs Mesurement">
    
    <label for="waist">Waist</label>
    <input type="text" id="waist" name="waist" placeholder="Enter Waist Measurement">

    <label for="hand">Hand</label>
    <input type="text" id="hand" name="hand" placeholder="Enter Hands Measurement">

    <label for="body">Body</label>
    <input type="text" id="waist" name="body" placeholder="Enter Waist Measurement">

    <label for="leg">Leg</label>
    <input type="text" id="leg" name="leg" placeholder="Enter Waist Measurement">
    
    
    <input type="submit" name="add_measurement" value="Submit">
  </form>
</div>

</body>
</html>

</body>
</html>