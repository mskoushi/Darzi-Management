<?php
session_start();
include '../config.php';

$result = mysqli_query($conn,"SELECT * FROM `order` ,`customer`,`tailor`,`product` WHERE o_id ='" . $_GET['o_id'] . "'");
$row= mysqli_fetch_array($result);




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <style>
        body{
	background-color: #F6F6F6; 
	margin: 0;
	padding: 0;
}
h1,h2,h3,h4,h5,h6{
	margin: 0;
	padding: 0;
}
p{
	margin: 0;
	padding: 0;
}
.container{
	width: 80%;
	margin-right: auto;
	margin-left: auto;
}
.brand-section{
   background-color: #0d1033;
   padding: 10px 40px;
}
.logo{
	width: 50%;
}

.row{
	display: flex;
	flex-wrap: wrap;
}
.col-6{
	width: 50%;
	flex: 0 0 auto;
}
.text-white{
	color: #fff;
    text-align : center;
   
}
.text-white1{
	color: #fff;
    
   
}
.company-details{
	float: right;
	text-align: right;
}
.body-section{
	padding: 16px;
	border: 1px solid gray;
}
.heading{
	font-size: 20px;
	margin-bottom: 08px;
}
/* .sub-heading{
	color: #262626;
	margin-bottom: 05px;
} */
table{
	background-color: #fff;
	width: 100%;
	border-collapse: collapse;
}
table thead tr{
	border: 1px solid #111;
	background-color: #f2f2f2;
}
table td {
	vertical-align: middle !important;
	text-align: center;
}
table th, table td {
	padding-top: 08px;
	padding-bottom: 08px;
}
.table-bordered{
	box-shadow: 0px 0px 5px 0.5px gray;
}
.table-bordered td, .table-bordered th {
	border: 1px solid #dee2e6;
}
.text-right{
	text-align: end;
}
.w-20{
	width: 20%;
}
/* .thankyou{
	float: right;
} */
    </style>
    <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('toPrint');
       var popupWin = window.open('', '_blank', 'width=500,height=500');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

</head>
<body>
    <div id ="toPrint" class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white1">DARZI</h1> <br>
                    <img src="../theLogo.jpg" alt="Logo" width="100" height="60">
                </div>
                
                <div class="col-6">
                    <div class="company-details">
                        <h3 class="text-white">ADDRESS</h3>
                        <p class="text-white">Neharu Nagar</p>
                        <p class="text-white">Near VCET College</p>
                        <p class="text-white">Puttur - 574203</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice ID : <?php echo $row['o_id'];  ?></h2>
                    <!-- <p class="sub-heading">Tracking No. fabcart2025 </p> -->
                    <p class="sub-heading">Customer Name: <?php echo $row['c_name'];  ?>  </p>
                    <p class="sub-heading">Order Date: <?php echo $row['o_date'];  ?></p>
                    <p class="sub-heading">Email ID:<?php echo $row['c_email_id'];  ?></p>
                    <p class="sub-heading">Phone Number: <?php echo $row['c_pno'];  ?> </p>
                </div>
                <!-- <div class="col-6">
                    <p class="sub-heading">Full Name:  </p>
                    <p class="sub-heading">Address:  </p>
                    <p class="sub-heading">Phone Number:  </p>
                    <p class="sub-heading">City,State,Pincode:  </p>
                </div> -->
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Bill Details</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th class="w-20">Product Name</th>
                        <th class="w-20">Measurment ID</th>
                        <th class="w-20">Stitched Tailor </th>
                        <th class="w-20">Dispatch  Date</th>
                        <th class="w-20">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $row['p_name'];  ?></td>
                        <td><?php echo $row['m_id'];  ?></td>
                        <td><?php echo $row['t_name'];  ?></td>
                        <td><?php echo $row['dispatch_date'];  ?></td>
                        <td><?php echo $row['o_price'];  ?></td>
                    </tr>
                    <!-- <tr>
                        <td colspan="4" class="text-right">Sub Total</td>
                        <td> 10.XX</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right">Tax Total %1X</td>
                        <td> 2</td>
                    </tr> -->
                    <tr>
                        <td colspan="4" class="text-right">Grand Total</td>
                        <td><?php echo $row['o_price'];  ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: COD</h3>
        </div>

        <div class="body-section">
            <center>
            <h2>THANK YOU..</h2>
            </center>
            <br>
            <p style="text-align: center;font-size: 20px;color: red">
          <input type="button" value="print" onclick="PrintDiv();" /></p>
        </div>      
    </div>      
 <!-- Core Scripts - Include with every page -->
 <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
</body>
</html>