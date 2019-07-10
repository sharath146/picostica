<?php 
//This page deals with the commission a user will get
//He can view his image download details
session_start();
//Check is user has logged in else Deny the Access
if(!isset($_SESSION['user_username']))
{
	echo "<CENTER><h1>ACCESS DENIED!!!</h1></center>";
}
else
{
	//If logged in
	include 'dbconnection.php';//Connection to Database
	//Query to retrieve user informtion
	$sql=mysqli_query($con,"SELECT * FROM user WHERE uname='$_SESSION[user_username]'") or die(mysqli_error($con));
	$rws=mysqli_fetch_array($sql);
	//Check whether the user type is purchase or sale
	if($rws['type']=='PURCHASE')
	{
		//if purchase! user cannot have any commission so, display message
		$status= "<center><h3 style=color:red;>Sorry, You Are Not a contributer!!!</h3><h4><a href=../contributer.php>Click here to become a contributer</a></h4></center>";
	}
	if($rws['type']=='SALE')
	{
		//if SALE! user can view his commission details
		$status= "<center><h3 style=color:green;>Welcome, You are a Contributer!!</h3><h4></center>";
	}
	//query to retrieve image_details uploaded by the particular user
	$sql1=mysqli_query($con,"SELECT SUM(count) AS downloads FROM image_less WHERE user_id='$rws[user_id]'") or die(mysqli_error($con));
	$trws2=mysqli_fetch_array($sql1);
	//Query to retrieve payment details from payment table for the particular user
	//$sql2=mysqli_query($con,"SELECT * FROM image_less WHERE user_id='$rws[user_id]'") or die(mysqli_error($con));
	//$trws1=mysqli_num_rows($sql2);
	$commission=$trws2['downloads']*5;
	$result=mysqli_query($con,"SELECT * FROM image_less WHERE user_id='$rws[user_id]'") or die(mysqli_error($con));
	$Uploads=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pic-O-Stica | Commission</title>
	<style type="text/css">
		tr{
			text-align:left;
			}
			.button
			{
				background-color: rgba(90,190,120,1);border: none;color:white;padding: 15px 32px;display: inline-block;font-size: 16px;font-family: Century Gothic,'serif';
				text-decoration: none;
			}
			a:focus{
				text-decoration: none;
			}
			a:active{
				text-decoration: none;
			}
			a:hover{
				text-decoration: none;
			}
			a:link{
				text-decoration: none;
			}
	</style>
</head>
<body style="margin: 0 auto;background-color: rgba(200,200,400,1);" alink="white" vlink="white" link="white">
<div style="width: 100%;height: 100px;background-color: rgba(23,23,31,1);text-align: center;"><br>
	<a href="../" style="text-decoration: none;color: white;font-weight: bold;font-size: 30px;">Pic-O-Stica</a>
</div>
<CENTER><h2>---Upload Rewards---</h2></CENTER>
<?php echo $status; ?>
<?php if($rws['type']=='SALE')//if the type of user is SALE
{ ?>
<table align="center">
	<tr>
		<th>USER ID:</th>
		<td><?php echo $rws['user_id']; ?></td>
	</tr>
	<tr>
		<th>USERNAME:</th>
		<td><?php echo $rws['uname']; ?></td>
	</tr>
	<tr>
		<th>Total Uploads:</th>
		<td><?php echo $Uploads; ?></td>
	</tr>
	<tr>
		<th>Total Downloads:</th>
		<td><?php echo $trws2['downloads']; ?></td>
	</tr>
	<tr>
		<th>Commission Obtained:</th>
		<td><?php echo $commission; ?></td>
	</tr>
</table>
<?php 
if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM commission WHERE user_id=$rws[user_id]")))
{
	mysqli_query($con,"UPDATE commission SET total_amt='$commission'") or die(mysqli_error($con));
}
else
{
mysqli_query($con,"INSERT INTO commission(user_id,total_amt)VALUES($rws[user_id],$trws2[downloads])") or die(mysqli_error($con));
}
 ?>
<p style="color:grey; font-weight: bold;"> Note: <?php echo $rws['fname'].' '.$rws['lname']; ?>, Payment to your account will be done only at the end of every month. For every image you have uploaded and that image being downloaded by others we will be paying you &#8377;5 Per image.</p>
<center><p><a href="bank-details.php?id=<?php echo $rws['user_id']; ?>"><h3 class="button">Click here to fill up your bank account details...</h3></a></p></center>
<?php } ?>
<footer style="text-align: bottom;">
	<center>Pic-O-Stica Inc.- <?php echo date('Y'); ?></center>
</footer>
</body>
</html>
<?php } ?>