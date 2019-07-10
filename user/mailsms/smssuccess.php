<?php 
$number=$_POST['number'];
$status=$_POST['status'];
$customID=$_POST['customID'];
if($status=='D')
{
	echo "Message was delivered Successfully!";
}
elseif($status=='U')
{
	echo "The message was undelivered";
}
elseif($status=='P')
{
	echo "Message Pending, the message is en route";
}
elseif($status=='I')
{
	echo "The number was invalid!";
}
elseif($status=='E')
{
	echo "The message expired!";
}
elseif($status=='?')
{
	echo "Unknown, we have not recieved a delivery status from the networks";
}
include '../database/dbconnection.php';
$sql=mysqli_query($con,"INSERT INTO sms(number,status,customid) VALUES($number,'status','customID')") or die(mysqli_error($con));
?>