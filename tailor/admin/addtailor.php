<?php 
  include_once '../partials/header1.php';
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'tailor');

// Insert tailor details
if (isset($_POST['add_tailor'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $pno = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $rating = mysqli_real_escape_string($db, $_POST['rating']);
  $experience = mysqli_real_escape_string($db, $_POST['experience']);
  $address = mysqli_real_escape_string($db, $_POST['address']);

  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  
  if (count($errors) == 0) {
     $query = " INSERT INTO `tailor` (`t_name`, `t_email_id`,`t_gender`, `t_age`, `t_pno`, `t_rating`, `t_experience`,`t_address`) VALUES ('$name', '$email', '$gender','$age','$pno','$rating','$experience','$address'); ";
  	mysqli_query($db, $query);
    $_SESSION['success'] = "Successfully Tailor details inserted";
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
    <title>Tailor</title>
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
<h3>Tailor Register Form</h3>
<?php include('errors.php'); ?>
<p>Enter Tailor Details</p>
</div>
<div class="container">
  <form method="post" action="addtailor.php">
    <label for="fname">Name</label>
    <input type="text" id="name" name="name" placeholder="Tailor name..">

    <label for="pno">Email Id</label>
    <input type="text" id="email" name="email" placeholder="Tailor Email Id">
    
    <label for="gender">Gender</label>
    <input type="text" id="gender" name="gender" placeholder="Tailor Gender">
    
    <label for="age">Age</label>
    <input type="text" id="age" name="age" placeholder="Tailor  Age">

    <label for="pno">Phone number</label>
    <input type="text" id="pno" name="phonenumber" placeholder="Tailor Phone number">
    
    <label for="age">Rating</label>
    <input type="text" id="rating" name="rating" placeholder="Tailor Rating">

    <label for="age">Experience</label>
    <input type="text" id="experience" name="experience" placeholder="Tailor Experience">

    
    <label for="address">Address</label>
    <br>
    <textarea id="address" name="address" placeholder="Write Tailor address." style="height:50px; width:1235px"></textarea>
    <input type="submit" name="add_tailor" value="Submit">
  </form>
</div>

</body>
</html>