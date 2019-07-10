<?php 
//Email confirmation section
//This code pack will check the activation key and activates the users account
require 'dbconnection.php';
$status="ACTIVE";
if(!empty($_REQUEST['id'])&& isset($_REQUEST['id']))
{
	$code=mysqli_real_escape_string($con,$_GET['id']);
	//Query to retrieve id_key and email from user_confirm
	$sql="SELECT id_key,email FROM user_confirm WHERE id_key='$code'";
	$result=mysqli_query($con,$sql) or die(mysqli_error($con));
	$trws=mysqli_num_rows($result);
	//if the code matches Update the user status
	if($trws==1)
	{
		$rws=mysqli_fetch_array($result);
		$email=$rws['email'];
		//Query to update the status of the user
		$row=mysqli_query($con,"UPDATE user SET status='$status' WHERE email='$email'");
		//Redirected to login page 
		echo "<script>alert('Successfully Verified!!!');window.location='../../login.php';</script>";
		}
		else
		{
			//If activation key doesn't match display error..and redirect to homepage
			echo "<script>alert('Successfully Verified!!!');window.location='../../index.php';</script>";
		}
	}
?>
