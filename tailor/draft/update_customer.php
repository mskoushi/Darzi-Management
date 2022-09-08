<?php
// Include config file
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'tailor');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Define variables and initialize with empty values
//$name = $address = $salary = "";
//$name_err = $address_err = $salary_err = ""; 

$name = $email =$gender = $age = $pno =$address="";
$name_err = $email_err =$gender_err=$age_err =$pno_err =$address_err="";

// Processing form data when form is submitted
if(isset($_POST["c_id"]) && !empty($_POST["c_id"])){
    // Get hidden input value
    $cid = $_POST["c_id"];
    
    // Validate name
    $input_name = trim($_POST["c_name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
     // Validate email
     $input_email = trim($_POST["c_email_id"]);
     if(empty($input_email)){
         $email_err = "Please enter a Email ID.";
     } elseif(!filter_var($input_email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/")))){
         $email_err = "Please enter a valid Email.";
     } else{
         $email = $input_email;
     }

     // Validate age
     $input_age = trim($_POST["c_age"]);
     if(empty($input_age)){
         $age_err = "Please enter a age.";
     } elseif(!filter_var($input_age, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/")))){
         $age_err = "Please enter a valid age.";
     } else{
         $age = $input_age;
     }

     // Validate gender
     $input_gender = trim($_POST["c_gender"]);
     if(empty($input_gender)){
         $gender_err = "Please enter a gender.";
     } elseif(!filter_var($input_gender, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/")))){
         $gender_err = "Please enter a valid gender.";
     } else{
         $gender = $input_gender;
     }

     // Validate Phone Number
     $input_pno = trim($_POST["c_pno"]);
     if(empty($input_pno)){
         $pno_err = "Please enter a pno.";
     } elseif(!filter_var($input_pno, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]+$/")))){
         $pno_err = "Please enter a valid pno.";
     } else{
         $pno = $input_pno;
     }

    // Validate address address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    
    
    // Check input errors before inserting in database
    //if(empty($name_err) && empty($email_err) && empty($age_err) && empty($gender_err) && empty($pno_err) && empty($address_err)) {
        // Prepare an update statement
        if(empty($name_err) && empty($email_err)) {
        $sql = "UPDATE customer SET c_name=?, c_email_id=?, c_age=? , c_gender=?,c_pno=? ,c_address=?WHERE c_id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_email, $param_age,$param_gender,$param_pno,$param_address, $param_cid);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_age = $age;
            $param_gender = $gender;
            $param_pno = $pno;
            $param_address = $address;
            $param_cid = $cid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: admin/index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["c_id"]) && !empty(trim($_GET["c_id"]))){
        // Get URL parameter
        $cid =  trim($_GET["c_id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM customer WHERE c_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_cid);
            
            // Set parameters
            $param_cid = $cid;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    
                    $c_id =$row["c_id"];   
                    $name =$row["c_name"];
                    $email=$row["c_email_id"];
                    $age=$row["c_age"];
                    $gender=$row["c_gender"];
                    $pno=$row["c_pno"];
                    $address=$row["c_address"];


                            
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the Customer record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="c_name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="c_email_id" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="text" name="c_age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>">
                            <span class="invalid-feedback"><?php echo $age_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <input type="text" name="c_gender" class="form-control <?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $gender; ?>">
                            <span class="invalid-feedback"><?php echo $gender_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="c_pno" class="form-control <?php echo (!empty($pno_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pno; ?>">
                            <span class="invalid-feedback"><?php echo $pno_err;?></span>
                        </div>
                        
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="c_address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin/index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>