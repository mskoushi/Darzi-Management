<?php 
include_once '..\..\partials\header.php';
include_once '../../config.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE measurement set  neck='" . $_POST['neck'] . "', shoulder='" . $_POST['shoulder'] . "', chest='" . $_POST['chest'] . "', abs='" . $_POST['waist'] . "', hand='" . $_POST['hand'] . "', body='" . $_POST['body'] . "', leg='" . $_POST['leg'] . "' WHERE m_id='" . $_GET['m_id'] . "' ");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM measurement WHERE m_id='" . $_GET['m_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Measurement  </title>
<link rel="stylesheet" type="text/css" href="../../form.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div> <div align="right" style="padding-bottom:5px;"></div>
<table border="0" cellpadding="10" cellspacing="0" width="1000" margin-left: auto;
  margin-right: auto; class="tblSaveForm">
  <tr class="header">
<td colspan="2">Edit Measurement of ID :<?php echo $row['m_id']; ?></td>
</tr>

 <input type="hidden" class="txtField" name="m_id" class="txtField" value="<?php echo $row['m_id']; ?>"> 
 <td> <label for="neck">Neck</label></td>
 <td> <input type="text" id="neck" class="txtField" name="neck" value="<?php echo $row['neck']; ?>"> </td>
   
    <tr>
  <td>  <label for="shoulder">Shoulder</label> </td>
  <td> <input type="text" id="shoulder" class="txtField" name="shoulder" value="<?php echo $row['shoulder']; ?>"> </td>
</tr>
  
<tr>
  <td>  <label for="chest">Chest</label> </td>
  <td> <input type="text" id="chest" class="txtField" name="chest" value="<?php echo $row['chest']; ?>"> </td>
</tr>

<tr>
 <td>  <label for="abs">Abs</label> </td>
 <td> <input type="text" id="abs" class="txtField" name="abs" value="<?php echo $row['abs']; ?>"> </td>
</tr> 

<tr>
 <td> <label for="waist">Waist</label> </td>
 <td> <input type="text" id="waist" class="txtField" name="waist" value="<?php echo $row['waist']; ?>"> </td>
</tr>

<tr>
<td>  <label for="hand">Hand</label> </td>
<td> <input type="text" id="hand" class="txtField" name="hand" value="<?php echo $row['hand']; ?>"> </td>
</tr>

<tr>
 <td>  <label for="body">Body</label> </td>
 <td> <input type="text" id="waist" class="txtField" name="body" value="<?php echo $row['body']; ?>"> </td>
</tr>

<tr>
  <td>  <label for="leg">Leg</label> </td>
  <td>     <input type="text" id="leg" class="txtField"  name="leg" value="<?php echo $row['leg']; ?>"> </td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="buttom"></td>
</tr>
</table>
</div>
</form>
</body>
</html> 