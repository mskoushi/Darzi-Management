<?php 
include_once '..\..\partials\header.php';
include_once '../../config.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE tailor set  t_name='" . $_POST['t_name'] . "', t_email_id='" . $_POST['t_email_id'] . "', t_age='" . $_POST['t_age'] . "', t_pno='" . $_POST['t_pno'] . "',  t_rating='" . $_POST['t_rating'] . "', t_experience='" . $_POST['t_experience'] . "', t_gender='" . $_POST['t_gender'] . "', t_address='" . $_POST['t_address'] . "' WHERE t_id='" . $_GET['t_id'] . "' ");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM tailor WHERE t_id='" . $_GET['t_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Customer </title>
<link rel="stylesheet" type="text/css" href="../../form.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div> <div align="right" style="padding-bottom:5px;"></div>
<table border="0" cellpadding="10" cellspacing="0" width="100" margin-left: auto;
  margin-right: auto; class="tblSaveForm">
  <tr class="header">
<td colspan="2">Edit Tailor of ID :<?php echo $row['t_id']; ?></td>
</tr>
    <input type="hidden" name="t_id" class="txtField" value="<?php echo $row['t_id']; ?>">
  <tr>
  <td>  <label for="name">Name</label></td>
  <td> <input type="text" id="t_name" name="t_name" value="<?php echo $row['t_name']; ?>"> </td>
 </tr>

 <tr>
 <td>  <label for="email_id">Email Id</label></td>
 <td> <input type="text" id="t_email_id" name="t_email_id" value="<?php echo $row['t_email_id']; ?>"></td>
</tr>

<tr>
<td> <label for="gender">Gender</label></td>
<td> <input type="text" id="t_gender" name="t_gender" value="<?php echo $row['t_gender']; ?>"></td>
</tr>  

<tr>
<td>  <label for="age">Age</label></td>
<td>  <input type="text" id="t_age" name="t_age" value="<?php echo $row['t_age']; ?>"></td>
</tr>

<tr>
<td>   <label for="pno">Phone number</label></td>
<td> <input type="text" id="t_pno" name="t_pno" value="<?php echo $row['t_pno']; ?>"></td>
</tr> 

<tr>
<td>   <label for="rating">Rating</label></td>
<td> <input type="text" id="t_rating" name="t_rating" value="<?php echo $row['t_rating']; ?>"></td>
</tr> 

<tr>
<td>   <label for="experience">Phone number</label></td>
<td> <input type="text" id="t_experience" name="t_experience" value="<?php echo $row['t_experience']; ?>"></td>
</tr> 


<tr>
<td> <label for="address">Address</label></td>

    <br>
<td> <textarea id="t_address" name="t_address" style="height:50px; width:500px" value="<?php echo $row['t_address']; ?>"></textarea> </td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="buttom"></td>
</tr>
</table>
</div>
</form>
</body>
</html> 