<?php 
session_start();
if(!isset($_SESSION['user_username']))
{
	//Permit access by checking whether the login session  is created or not
	echo "<center><h1>Access Denied!!!</h1></center>";
} 
else
{
	$total='';
	$Order_Id=rand(0,9999999999);
	//If session created!!
	if(isset($_GET['imgid'])&&isset($_GET['price'])&&isset($_GET['title']))//Check whether headers are set
	{//if YES!
		include 'database/dbconnection.php';//Include database connection file
		//Query to get the user ID
		$res=mysqli_query($con,"SELECT * FROM user WHERE uname='$_SESSION[user_username]'");
		$rws=mysqli_fetch_array($res);
		$uid=$rws['user_id'];
		$image_id=$_GET['imgid'];
		$image_title=$_GET['title'];
		$price=$_GET['price'];
		//Query to get the cart details
		$sql5=mysqli_query($con,"SELECT * FROM cart WHERE user_id=$uid") or die(mysqli_query($con));
		$rws2=mysqli_num_rows($sql5);
		$res3=mysqli_fetch_array($sql5);
		//check whether the same item has been added or not
		if($res3['image_id']==$image_id)
		{
			//if YES! Display error message
			$msg= "Item already exists";
		}
		else
		{//if NO! Insert the new product into cart
			$sql=mysqli_query($con,"INSERT INTO cart(user_id,image_id,image_title,image_price)VALUES($uid,$image_id,'$image_title',$price)") or die(mysqli_error($con));
			header('location:cart.php');
		}
	}
	else
	{//if the headers are not created and user needs to view
		include 'database/dbconnection.php';//include database connection file
		//Query to retrieve user ID
		$res=mysqli_query($con,"SELECT * FROM user WHERE uname='$_SESSION[user_username]'");
		$rws=mysqli_fetch_array($res);
		$uid=$rws['user_id'];
		//Query to retrieve cart details of the user
		$sql2=mysqli_query($con,"SELECT * FROM cart WHERE user_id=$uid") or die(mysqli_query($con));
		$rws2=mysqli_num_rows($sql2);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pic-O-Stica | Cart</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
</head>
<body>
<div style="background-color: rgba(23,23,31,1);width: 100%;height:100px;"><br>
	<a href="index.php" style="text-align: center;font-family: century gothic,'serif';font-size: 30px;text-decoration: none;"><center>Pic-O-Stica</center></a>
</div><br>
<div class="container">
	<?php if(@$msg){ ?>
	<div class="alert alert-danger" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		<span class="sr-only"></span>
		<?=$msg?>
	</div>
	<?php } ?>
	<div class="panel panel-info">
	<!-- Panel of the ordered items in cart -->
	<div class="panel-heading">Your cart <?php if($rws2< 1)
	{ echo "is empty"; } ?>
	</div>
		
		<!--Table -->
		<table class="table table-hover">
			<thead>
				<tr  class="success">
					<th>#</th><th>Image Name</th><th>Price</th><th>Control</th>
				</tr>
			</thead>
			<tbody>
				<?php if($rws2>= 1) {
					//If order have one item or more loop in it and make a list of items in cart
					$n=1;
					$total=0;
					$sql6=mysqli_query($con,"SELECT * FROM cart WHERE user_id=$uid");
					while($item =mysqli_fetch_array($sql6)){
					$cartid=$item['cart_id'];
				 ?>
				 <tr>
				 	<th scope="row">
				 	<?=$n?>
				 	</th>
				 	<td>
				 	<?=$item['image_title']?>	
				 	</td><td><?=$item['image_price']?></td>
				 	<td><a href="cart-process.php?do=delete&id=<?php echo $cartid; ?>&uid=<?php echo $uid; ?>"><span class="btn btn-danger">Remove</span></a></td>
				 </tr>
				 <?php
				 $n++;
				 $total +=$item['image_price'];
				 }}?>
			</tbody>
			<tfoot>
				<tr><th>#</th><th>Total</th><th><?php echo(@$total)?$total:'0'; ?>&#8377;</th><th></th></tr>
			</tfoot>
		</table>
			<div class="panel-body btn-group btn-group-justified">
			<div class="panel-footer">
				<div class="btn-group col-md-4" role="group">
				<a href="cart-process.php?do=deleteall&uid=<?php echo $uid; ?>"><span class="btn  btn-danger col-md-8">Empty Cart</span></a>
				</div>
				<?php 
				$res1=mysqli_query($con,"SELECT * FROM subscription WHERE user_id=$uid") or die(mysqli_error($con));
				if(mysqli_num_rows($res1))
				{
					$rws1=mysqli_fetch_array($res1);
					if($rws1['amount']>=$total)
					{
						?>
						<div class="btn-group col-md-4" role="group">
						<a class="col-md-8 btn btn-success" href="components/downloadpack.php?amt=<?php echo $total; ?>">Download Images</a>
			</div>
						<?php
					}
					else
					{
						?>
						<div class="btn-group col-md-4" role="group">
			<form method="post" name="customerData" action="components/ccavenue/ccavRequestHandler.php">
		<input type="hidden" name="tid" id="tid" readonly />
		<input type="hidden" name="merchant_id" value="125874"/>
		<input type="hidden" name="order_id" value=<?php echo $Order_Id; ?>>
		<input type="hidden" name="amount" value="<?php echo $total; ?>"/>
		<input type="hidden" name="currency" value="INR"/>
		<input type="hidden" name="redirect_url" value="http://picostica/user/components/ccavenue/ccavResponseHandler.php"/>
		<input type="hidden" name="cancel_url" value="http://picostica/user/components/ccavenue/ccavResponseHandler.php"/>
		<input type="hidden" name="language" value="EN"/>
		<input type="hidden" name="billing_name" value="<?php echo $rws['uname']; ?>"/>
		<input type="hidden" name="billing_address" value="<?php echo $rws['address']; ?>"/>
		<input type="hidden" name="billing_email" value="<?php echo $rws['email']; ?>"/>
			<button type="Submit" value="Submit Order" class="form-control col-md-8 col-md-4">Submit Order</button>				</form>
			</div>			

						<?php
					}
				}
				else
				{
				?>
								<div class="btn-group col-md-4" role="group">
			<form method="post" name="customerData" action="components/ccavenue/ccavRequestHandler.php">
		<input type="hidden" name="tid" id="tid" readonly />
		<input type="hidden" name="merchant_id" value="125874"/>
		<input type="hidden" name="order_id" value=<?php echo $Order_Id; ?>>
		<input type="hidden" name="amount" value="<?php echo $total; ?>"/>
		<input type="hidden" name="currency" value="INR"/>
		<input type="hidden" name="redirect_url" value="http://picostica/user/components/ccavenue/ccavResponseHandler.php"/>
		<input type="hidden" name="cancel_url" value="http://picostica/user/components/ccavenue/ccavResponseHandler.php"/>
		<input type="hidden" name="language" value="EN"/>
		<input type="hidden" name="billing_name" value="<?php echo $rws['uname']; ?>"/>
		<input type="hidden" name="billing_address" value="<?php echo $rws['address']; ?>"/>
		<input type="hidden" name="billing_email" value="<?php echo $rws['email']; ?>"/>
			<button type="Submit" value="Submit Order" class="form-control col-md-8 col-md-4">Submit Order</button>				</form>
			</div>	

				<?php
				}
				?>
			
				</div>
			</div>
				
			</div>
			</div>
	</div>
</div>
<script type="text/javascript" src="cart/js/main.js"></script>
<script type="text/javascript" src="assets/js/bootsrap/bootstrap.js"></script>
</body>
</html>
<?php } ?>