<?php 
session_start();


include_once '../config.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE customer set  c_name='" . $_POST['c_name'] . "', c_gender='" . $_POST['c_gender'] . "', c_age='" . $_POST['c_age'] . "', c_pno='" . $_POST['c_pno'] . "', c_address='" . $_POST['c_address'] . "' WHERE c_email_id='" . $_GET['email'] . "' ");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM customer WHERE c_email_id='" . $_GET['email'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Your Detais </title>
<link rel="stylesheet" type="text/css" href="../form.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:900px; ">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div> <div align="right" style="padding-bottom:5px;"><a href="index.php" class="link"> GO TO MENU</a></div>
<table border="0" cellpadding="10" cellspacing="0" width="900"    margin: 50px auto 0px;
 class="tblSaveForm">
  <tr class="header">
      <td colspan="2">Edit Customer of ID :<?php echo $row['c_id']; ?></td> 
</tr>
<tr class="header">
  <td colspan="3">Customer Email ID :<?php echo $row['c_email_id']; ?></td>
</tr>
    <input type="hidden" name="c_id" class="txtField" value="<?php echo $row['c_id']; ?>">
  <tr>
  <td>  <label for="fname">Name</label></td>
  <td> <input type="text" id="c_name" name="c_name" value="<?php echo $row['c_name']; ?>"> </td>
 </tr>

 

<tr>
<td> <label for="gender">Gender</label></td>
<td> <input type="text" id="c_gender" name="c_gender" value="<?php echo $row['c_gender']; ?>"></td>
</tr>  

<tr>
<td>  <label for="age">Age</label></td>
<td>  <input type="text" id="c_age" name="c_age" value="<?php echo $row['c_age']; ?>"></td>
</tr>

<tr>
<td>   <label for="pno">Phone number</label></td>
<td> <input type="text" id="c_pno" name="c_pno" value="<?php echo $row['c_pno']; ?>"></td>
</tr> 

<tr>
<td> <label for="address">Address</label></td>
<td> <textarea type="text" id="c_address" name="c_address" style="height:50px; width:500px" value="<?php echo $row['c_address']; ?>" required ></textarea> </td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="buttom"></td>
</tr>
</table>
</div>
</form>
</body>
</html> 