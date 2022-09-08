<?php 
  include_once '../partials/header1.php';
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'tailor');

// REGISTER USER
if (isset($_POST['add_customer'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $pno = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($age)) { array_push($errors, "Age is required"); }
  if (empty($pno)) { array_push($errors, "Phone Number is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }



  
  if (count($errors) == 0) {

    $query = "SELECT * FROM customer WHERE `c_email_id`='$email'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) >0) {
      array_push($errors, "Email ID Exist ! Use another Email Id");
    
    }
    else {
    $password = md5($password_1);
     $query = " INSERT INTO `customer` (`c_name`, `c_email_id`, `c_age`, `c_gender`, `c_pno`, `c_address`) VALUES ('$name', '$email', '$age','$gender','$pno','$address'); ";
     $create = "INSERT INTO `clogin`(`username`,`email`,`password`) VALUES ('$name','$email','$password'); ";
  	mysqli_query($db, $query);
    mysqli_query($db, $create);
    $message = "Record Modified Successfully";
    $_SESSION['success'] = "Successfully Customer details inserted";
    $_SESSION['cid'] = $name;
  	header('location: admin/index.php');

  }

}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add customer</title>
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

input[type=email], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=number], select {
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
<h3>Customer Register Form</h3>
<?php include('C:\xampp\htdocs\tailor\admin\errors.php'); ?>

<p>Enter your Details</p>
<!-- <p>Successfully  added <strong><?php // echo $_SESSION['c_name']; ?></strong></p> -->

</div>
<div class="container">
  <form method="post" action="addcustomer.php">
    <label for="fname">Name</label>
    <input type="text" id="name" name="name" placeholder="Customer name.."value="<?php echo (isset($name)) ? $name : '';?>">

    <label for="email_id">Email Id</label>
    <input type="email" id="email" name="email" placeholder="Customer Email Id" value="<?php echo $email; ?>">

    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Create Password">
    
    <label for="gender">Gender</label> <br><br>
    <input type="radio" id="gender1" name="gender" value="Male"> <span>
   <label for="gender">Male</label>
   <input type="radio" id="gender2" name="gender" value="Female"><span>
   <label for="gender">Female</label> 
   <input type="radio" id="gender3" name="gender" value="Other"><span>
   <label for="gender">Other</label><br>

  
    <br> <label for="age">Age</label> 
    <input type="number" id="age" name="age" placeholder="Customer's  Age" value="<?php echo (isset($age)) ? $age : ''; ?>">

    <label for="pno">Phone number</label><br> 
    <input type="number" id="pno" name="phonenumber" pattern="[1-9]{1}[0-9]{9}" placeholder="Customer Phone number" value="<?php echo (isset($pno)) ? $pno : ''; ?>">
  
   
    <label for="address">Address</label> <br>
    
    <textarea type="text" id="address" name="address" style="height:50px; width:1150px"><?php echo (isset($address)) ? $address : ''; ?></textarea>
 
    
    <input type="submit" name="add_customer" value="Submit">

    <?php  if (isset($_SESSION['add_customer'])) : ?>
    
     <?php endif ?>
  </form>
</div>

</body>
</html>

