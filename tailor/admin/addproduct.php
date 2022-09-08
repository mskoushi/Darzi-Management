<?php 
  
session_start();
include_once '../partials/header1.php';
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'tailor');

// Insert product
if (isset($_POST['add_product'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $cat = mysqli_real_escape_string($db, $_POST['cat']);
  $price = mysqli_real_escape_string($db, $_POST['price']);
  
  if (empty($name)) { array_push($errors, "Product name is required"); }
  if (empty($cat)) { array_push($errors, "Category is required"); }
  if (empty($price)) { array_push($errors, "Price is required"); }

  if (count($errors) == 0) {
     $query = " INSERT INTO `product` (`p_name`, `p_category`, `p_price`) VALUES ('$name', '$cat', '$price');";
      
  	mysqli_query($db, $query);
    $_SESSION['success'] = "Successfully product details inserted";
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
<h3>Product Register Form</h3> 
<?php include('errors.php'); ?>
<p>Enter Product Details</p>
</div>
<div class="container">
  <form method="post" action="addproduct.php">
    <label for="fname">Name</label>
    <input type="text" id="name" name="name" placeholder="Product name..">

    <label for="cat">Category</label>
    <input type="text" id="cat" name="cat" placeholder="Product Category">
    
    <label for="price">Price</label>
    <input type="text" id="price" name="price" placeholder="Product Price">
    
    <input type="submit" name="add_product" value="Submit">
  </form>
</div>

</body>
</html>

</body>
</html>