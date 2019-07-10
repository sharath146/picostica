<?php 
include 'dbconnection.php';
if(isset($_POST['username']) && $_POST['action']=='availability')
{
	$username=mysqli_real_escape_string($con,$_POST['username']);//Get the username values
	$query="SELECT uname FROM user WHERE uname='$username'";
	$res=mysqli_query($con,$query);
	$count=mysqli_num_rows($res);
	echo $count;
}
else
{
}
 ?>