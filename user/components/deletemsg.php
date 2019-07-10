<?php 
include 'dbconnection.php';
if(isset($_GET['id']))
{
	$messageid=$_GET['id'];
	mysqli_query($con,"DELETE FROM usernotify WHERE id=$messageid");
	if(mysqli_affected_rows($con))
	{
		echo "<script>alert('Message Deleted!!');window.location='usernotify.php';</script>";
	}
	else
	{
		echo "<script>alert('Couldn't delete Message!!);window.location='usernotify.php';</script>";
	}
}
?>