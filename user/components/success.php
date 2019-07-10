<?php 
session_start();
$username=$_SESSION['user_username'];
$end_date=date('Y-m-d H:m:s', strtotime("+30 days"));
$sql5="INSERT INTO subscription(user_id,amount,date_of_sub,date_of_end,sub_cat) VALUES($user_id,$Amt,now(),'$end_date','$sub_type')";
$result5=mysqli_query($con,$sql5) or die(mysqli_error($con));
 ?>
