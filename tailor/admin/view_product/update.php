<?php 
include_once '..\..\partials\header.php';
include_once '../../config.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE product set  p_name='" . $_POST['p_name'] . "', p_category='" . $_POST['p_category'] . "', p_price='" . $_POST['p_price'] . "' WHERE p_id='" . $_GET['p_id'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM product WHERE p_id='" . $_GET['p_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Product </title>
<link rel="stylesheet" type="text/css" href="../../form.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:900px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div> <div align="right" style="padding-bottom:5px;"></div>
<table border="0" cellpadding="10" cellspacing="0" width="900" margin-left: auto;
  margin-right: auto; class="tblSaveForm">
<tr class="header">
<td colspan="2">Edit Product of ID :<?php echo $row['p_id']; ?></td>
</tr>
<tr>
<td><label>Product Name</label></td>
<td><input type="hidden" name="p_id" class="txtField" value="<?php echo $row['p_id']; ?>">
<input type="text" name="p_name" class="txtField" value="<?php echo $row['p_name']; ?>"></td>
</tr>
<tr>
<td><label>Product Catgory</label></td>
<td><input type="text" name="p_category" class="txtField" value="<?php echo $row['p_category']; ?>"></td>
</tr>
<td><label>Product Price</label></td>
<td><input type="text" name="p_price" class="txtField" value="<?php echo $row['p_price']; ?>"></td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="buttom"></td>
<td colspan="2"><a href="../../admin/index.php"  type="text"  value="MENU" class="buttom"> MENU </td>
</tr>
</table>
</div>
</form>
</body>
</html> 