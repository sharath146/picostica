<?php 
session_start();
if(!isset($_SESSION['user_username']))
{
	echo "<Center><h1>Access Denied!!!</h1></center>";
}
else
{
	if(isset($_GET['id']))
	{
		include 'dbconnection.php';
		include '../mailsms/sms.php';
		$image_id=$_GET['id'];
		$username=$_SESSION['user_username'];
		$sql2=mysqli_query($con,"SELECT * from user WHERE uname='$username'") or die(mysqli_error($con));
		$rws1=mysqli_fetch_array($sql2);
		$sql=mysqli_query($con,"SELECT * FROM image_less WHERE image_id='$image_id'") or die(mysqli_error($con));
		$rws=mysqli_fetch_array($sql);
		if($rws['count']=='NULL') 
		{
			mysqli_query($con,"UPDATE image_less SET count=0 WHERE image_id='$image_id'");
		}
		$fullpath='../upload/'.$rws['img_path'];
		$newname=$rws['img_title'].'.'.strtolower($rws['image_type']);
		if(isset($_POST['download-button']))
		{
		//Begin writing headers
			header("Content-Description: File Transfer");
			header("Cache-Control:public");
			//type of file to download
			header("Content-Type: application/octet-stream");
			//File name to be set while downloading
		header("Content-Disposition:attachment;filename=".$newname);
		//Length of the downloading file
		header("Content-Length:".filesize($fullpath));
			ob_clean();//discard all things in buffer
			//Query to Update download count status by 1
			$res=mysqli_query($con,"UPDATE image_less SET count = count + 1 WHERE image_id='$image_id'") or die(mysqli_error($con));
			$trws=mysqli_affected_rows($con);
			//Update amount in subscription by subtracting 16 from amount for each download
			mysqli_query($con,"UPDATE subscription SET amount = amount - 16 WHERE user_id='$rws1[user_id]'") or die(mysqli_error($con));
			$rws30=mysqli_query($con,"SELECT * FROM subscription WHERE user_id=$rws1[user_id]");
			$rwss=mysqli_fetch_array($rws30);
			flush();
			//Source of the file to be downloaded
			readfile($fullpath);
			mysqli_query($con,"INSERT INTO sales(image_id,user_id,subscription_id,sale_amount,sale_date) VALUES($image_id,$rws1[user_id],$rwss[subscription_id],16,now())") or die(mysqli_error($con));
			$fulname=$rws1['fname'].' '.$rws1['lname'];
			$mobile=$rws1['mobile_no'];
			$bal=$rwss['amount'];
			sendsms($mobile,$fulname,$bal);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pic-O-Stica | Download</title>
	<style type="text/css">
		.button{
			background-color: #4caf50;
			border: none;
			color:white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
		}
	</style>
</head>
<body style="margin: 0 auto;background-color: rgba(200,100,100,1);" alink="white" vlink="white" link="white">
<div style="background-color: rgba(23,23,31,1);color: white;width: 100%;height: 100px;"><br><a style="text-decoration: none;text-align: center;font-weight: bold;font-size: 30px;" href="../index.php"><center>Pic-O-Stica</center></a>
</div>
<div style="padding-top: 80px;">
<center>
<div>
	<?php
	$res=mysqli_query($con,"SELECT * FROM image_less WHERE image_id=$image_id") or die(mysqli_error($con));
	$rows=mysqli_fetch_array($res);
	?>
	<img src="../thumbs/<?php echo $rows['thumb_path'] ?>" width="300" height="200" style="border-style: double;border-radius: 2px;border-color: yellow;">
</div>
<br>
<form action="" method="post">
<a href="../index.php"><button name="download-button"  class="button">Download</button></a>
</form></center>
</div>
</body>
</html>
<?php 
}
}
?>