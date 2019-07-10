<?php 
session_start();
if(!isset($_SESSION['user_username']))
{
	echo "<center><h1>ACCESS DENIED!!</h1></center>";
}
else
{
	include 'dbconnection.php';
	$result=mysqli_query($con,"SELECT * FROM user WHERE uname='$_SESSION[user_username]'") or die(mysqli_error($con));
	$rws=mysqli_fetch_array($result);
	$uid=$rws['user_id'];
	$sql=mysqli_query($con,"SELECT * FROM image_less WHERE user_id=$uid AND approval='APPROVED'") or die(mysqli_error($con));
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pic-O-Stica | My Images</title>
	<link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.css">
	<script type="text/javascript" src="../assests/js/base/jquery.min.js"></script>
	<script type="text/javascript" src="../assests/js/bootstrap/bootstrap.min.js"></script>
</head>
<body style="margin: 0 auto;">
<div style="background-color: rgba(23,23,31,1);color: white;width: 100%;height: 100px;"><br><a style="text-decoration: none;text-align: center;font-weight: bold;font-size: 30px;" href="../index.php"><center>Pic-O-Stica</center></a>
</div>

<div class="container">
    <br>
    <div class="row">
<?php
if(mysqli_num_rows($sql))
{
	while($trws=mysqli_fetch_array($sql))
	{
		echo '<div class="col-md-3">';
      echo '<div class="thumbnail">';
        echo '<img src="../thumbs/'.$trws['thumb_path'].'" alt="'.$trws['img_title'].'">
          <div class="caption">
            <p>'.$trws['img_desc'].'
          </div>
      </div>
    </div>';
	}
}
else
{
	echo "<center><h1>No Images Uploaded!!</h1></center>";
}
?>
</body>
</html>


<?php
}
 ?>