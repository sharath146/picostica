<?php 
session_start();
if(!isset($_SESSION['user_username']))
{
	echo "<center><h1>Access Denied!!</h1></center>";
}
else
{
 ?>
<?php
include 'dbconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Picostica | User Messages</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/bootstrap.css">
	<script type="text/javascript" src="../assets/js/bootstrap/bootstrap.min.js"></script>
</head>
<body link="white" alink="white" vlink="white">
<div style="background-color: rgba(23,23,31,1);width: 100%;height: 100px;padding-top: 30px;">
<center>
	<a href="../index.php" style="color: white; font-size: 30px;font-weight: bold;font-family: century gothic,'serif';text-decoration: none;">Pic-O-Stica</a></center>
</div>
<div class="row">
<div class="col-md-4">
	
</div>
<div class="col-md-4 panel panel-primary">
<div class="panel-heading">Messages For you-<?php echo $_SESSION['user_username']; ?></div>
<div class="panel-body">
	<?php 
		$res=mysqli_query($con,"SELECT * FROM user WHERE uname='$_SESSION[user_username]'");
		$rws=mysqli_fetch_array($res);
		$uid=$rws['user_id'];
		$sql=mysqli_query($con,"SELECT * FROM usernotify WHERE user_id=$uid ORDER BY datepro DESC") or die(mysqli_error($con));
		if(mysqli_num_rows($sql))
		{
			while($rows=mysqli_fetch_array($sql))
			{
				echo "<h6>".$rows['datepro']."</h6>";
				echo "<p class='text-success'>".$rows['message']."</p>";
				echo "<a href=deletemsg.php?id=".$rows['id']."><button type=button class='btn btn-danger'>Delete Message</button></a><hr>";
			}
		}
		else
		{
			?>
				<center><h5>No Messages!!</h5></center>

			<?php
		}
	 ?>
</div>
</div>
</div>
</body>
</html>
<?php 

} ?>
