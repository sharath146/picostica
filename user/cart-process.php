<?php 
session_start();
if(!isset($_SESSION['user_username']))
{
	echo "<CENTER><h1>Access Denied!!!</h1></center>";
}
else
{
	include 'database/dbconnection.php';
	if(isset($_GET['do']))
	{
		$usid=$_GET['uid'];
		switch($_GET['do'])
		{
			case 'delete': 	$id=$_GET['id'];
			 $sql=mysqli_query($con,"DELETE FROM cart WHERE cart_id=$id") or die(mysqli_error($con));
				$trws=mysqli_affected_rows($con);
				header('location:cart.php'); 
				break;
			case 'deleteall':
						$sql1=mysqli_query($con,"DELETE FROM cart WHERE user_id=$usid") or die(mysqli_error($con));
						$trws1=mysqli_affected_rows($con);
						header('location:cart.php');
						break;
		}
	}

}
 ?>
