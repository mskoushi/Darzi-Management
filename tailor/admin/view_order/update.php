<?php 
include_once '..\..\partials\header.php';
include_once '../../config.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE `order` set c_id='" . $_POST['c_id'] . "', p_id='" . $_POST['p_id'] . "', t_id='" . $_POST['t_id'] . "', m_id='" . $_POST['m_id'] . "', o_date='" . $_POST['o_date'] . "', o_price='" . $_POST['o_price'] . "', dispatch_date='" . $_POST['dispatch_date'] . "' WHERE  o_id='" . $_GET['o_id'] . "' ");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM `order` WHERE o_id ='" . $_GET['o_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Order</title>
<link rel="stylesheet" type="text/css" href="../../form.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div> <div align="right" style="padding-bottom:5px;"></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="header">
<td colspan="2">Edit Order <?php echo $row['o_id']; ?></td>
</tr>
<tr>
<td><label>Customer ID </label></td>
<td><input type="hidden" name="o_id" class="txtField" value="<?php echo $row['o_id']; ?>">
<input type="text" name="c_id" class="txtField" value="<?php echo $row['c_id']; ?>"></td>
</tr>
<tr>
<td><label>Product ID</label></td>
<td><input type="text" name="p_id" class="txtField" value="<?php echo $row['p_id']; ?>"></td>
</tr>
<td><label>Tailor ID</label></td>
<td><input type="text" name="t_id" class="txtField" value="<?php echo $row['t_id']; ?>"></td>
</tr>

</tr>
<td><label>Measurement ID</label></td>
<td><input type="text" name="m_id" class="txtField" value="<?php echo $row['m_id']; ?>"></td>
</tr>

</tr>
<td><label>Order Date</label></td>
<td><input type="date" name="o_date" class="txtField" value="<?php echo $row['o_date']; ?>"></td>
</tr>

</tr>
<td><label>Order Price</label></td>
<td><input type="text" name="o_price" class="txtField" value="<?php echo $row['o_price']; ?>"></td>
</tr>

</tr>
<td><label>Dispatch Date</label></td>
<td><input type="date" name="dispatch_date" class="txtField" value="<?php echo $row['dispatch_date']; ?>"></td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="buttom"></td>
</tr>
</table>
</div>
</form>
</body>
</html> 