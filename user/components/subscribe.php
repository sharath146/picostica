<?php
//This page deals with the subscription of packages and will redirect to the payment gateway 
session_start();
if(!isset($_SESSION['user_username']))
{
	//Check if user is logged in else deny Access
	echo "<CENTER><h1>Access Denied!!!</h1></center>";
}
else
{
$username=$_SESSION['user_username'];
$total_image_month='';//total numbe of images allowed per month
$sub_type='';//Type of the subscription
//Unique OderId that should be passes to payment gateway
$Order_Id=rand(0,9999999999);
include 'dbconnection.php';
$sql1="SELECT * FROM user WHERE uname='$username'";
$result=mysqli_query($con,$sql1);
$trws=mysqli_num_rows($result);
	$rws=mysqli_fetch_array($result);
	$user_id=$rws['user_id'];
	//Check which package has been selected
	switch($_GET['type'])
	{
		case 'purchase1': $amt=1600;
							$total_image_month=100;
							$sub_type="BRONZE";
							$price_per_image=16;
							break;
		case 'purchase2': $amt=2400;
							$total_image_month=150;
							$sub_type="SILVER";
							$price_per_image=16;
							break;
		case 'purchase3': $amt=3200;
							$total_image_month=200;
							$sub_type="GOLD";
							$price_per_image=16 ;
							break;
							
	}
?>
<html>
<head>
<style type="text/css">
	tr{
		text-align: left;
	}
	th{
		color:black;
	}
	td{
		padding-left: 10px;
	}
</style>
<script>
//FUnction to create unique transaction ID
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
</script>
</head>
<body style="background-color: gold;text-align: center;font-family: century Gothic,'serif';color:white;font-size: 20px; margin:0 auto;" alink="white" vlink="white" link="white">
<div style="width: 100%;height: 100px;background-color: rgba(23,23,31,1);"><br>
<a href="../index.php" style="top:80px;text-decoration: none;font-weight: bold;font-size: 30px;">Pic-O-Stica</a>
</div>
	<form method="post" name="customerData" action="ccavenue/ccavRequestHandler.php">
<CENTER><h2>----ORDER DETAILS----</h2></CENTER>
<table style="border-style: none;" align="center">
<tr><th>Billing Name:</th><td><?php echo $username; ?></td>
</tr>
<tr><th>Billing Address:</th><td><?php echo $rws['address']; ?></td></tr>
<tr><th>Billing E-mail:</th><td><?php echo $rws['email']; ?></td></tr>
<tr><th>Package Type:</th><td><?php echo $sub_type; ?></td></tr>
<tr><th>Package Value:</th><td>&#8377;<?php echo $amt; ?></td></tr>
<tr><th>Images Per Month:</th><td><?php echo $total_image_month; ?></td></tr>
<tr><th>Price Per Image:</th><td>&#8377;<?php echo $price_per_image; ?></td></tr>
</table>

<input type="hidden" name="tid" id="tid" readonly />
<input type="hidden" name="merchant_id" value=""/>
<input type="hidden" name="order_id" value=<?php echo $Order_Id; ?>>
<input type="hidden" name="amount" value="<?php echo $amt; ?>"/>
<input type="hidden" name="currency" value="INR"/>
<input type="hidden" name="redirect_url" value="http://picostica/user/components/ccavenue/ccavResponseHandler.php"/>
<input type="hidden" name="cancel_url" value="http://picostica/user/components/ccavenue/ccavResponseHandler.php"/>
<input type="hidden" name="language" value="EN"/>
<input type="hidden" name="billing_name" value="<?php echo $username; ?>"/>
<input type="hidden" name="billing_address" value="<?php echo $rws['address']; ?>"/>
<input type="hidden" name="billing_email" value="<?php echo $rws['email']; ?>"/>
<br>
<INPUT TYPE="submit" value="Proceed To CheckOut" style="background-color: rgba(100,150,100,1);border: none;color:white;padding: 15px 32px;text-decoration: none;display: inline-block;font-size: 16px;font-family: Century Gothic,'serif';">
<a href="../index.php"  style="background-color: rgba(300,150,100,1);border: none;color:white;padding: 15px 32px;text-decoration: none;display: inline-block;font-size: 16px;font-family: Century Gothic,'serif';">Cancel</a>
	      </form>
	</body>
</html>
<?php } ?>