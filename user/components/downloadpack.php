<?php session_start(); 
if(!isset($_SESSION['user_username']))
{
	echo "<center><h1>ACCESS DENIED!!!</h1></center>";
}
else
{
	$message='';
	function zipFilesDownload($file_names,$archive_file_name,$file_path)
{
	$zip = new ZipArchive();

	if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE) {
    	exit("cannot open <$archive_file_name>\n");
	}

	foreach($file_names as $files)
	{
  		$zip->addFile($file_path.$files,$files);
	}
	$zip->close();

	header("Content-type: application/zip"); 
	header("Content-Disposition: attachment; filename=$archive_file_name"); 
	header("Pragma: no-cache"); 
	header("Expires: 0"); 
	readfile("$archive_file_name");
	unlink('myImages.zip');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Picostica | Download</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/bootstrap.css">
	<script type="text/javascript" src="../assets/js/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../jquery.min.js"></script>
</head>
<body>
<div style="width: 100%;height: 100px;background-color: rgba(23,23,31,1);">
	<center style="padding-top: 20px;"><a href="../index.php" style="padding-top: 20px;font-size: 30px;font-weight: bold;">Pic-O-Stica</a></center>
</div>
<div class="panel panel-success">
<div class="panel-heading">Download Images</div>
<div class="panel-body">
	<?php
	if(!isset($_GET['amt']))
	{
		header('location:../index.php');
	}
	include 'dbconnection.php';
	$result=mysqli_query($con,"SELECT * FROM user where uname='$_SESSION[user_username]'") or die(mysqli_error($con));
	$row=mysqli_fetch_array($result);
	$rws=mysqli_query($con,"SELECT * FROM cart WHERE user_id=$row[user_id]");
	if(mysqli_num_rows($rws))
	{
		$filenames=array();
		while($rows=mysqli_fetch_array($rws))
		{
			$res=mysqli_query($con,"SELECT * FROM image_less WHERE image_id=$rows[image_id]");
			$ress=mysqli_fetch_array($res);
			$imagenames='../upload/'.$ress['img_path'];
			echo "<div class='col-md-2'>";
			echo "<img src=../thumbs/".$ress['thumb_path']." width=100% alt=".$ress['img_title']."></div>";
			$filenames[]=$imagenames;
		}
	}
	else
	{
		echo "Cart is Empty!!!";
	}
	echo $message;
	?>
</div>
<form action="" method="post">
<div class="panel-footer"><button type=submit class='btn btn-success' name="download">Download all as Zip</button></div>
</form>
</div>
</body>
</html>
<?php
if(isset($_REQUEST['download']))
{
	$bal=$_REQUEST['amt'];
	mysqli_query($con,"UPDATE subscription SET amount = amount - $bal WHERE user_id='$row[user_id]'") or die(mysqli_error($con));
	$zip_file_name='Picostica-myImages.zip';
	$file_path=dirname(__FILE__).'/';
	zipFilesDownload($filenames,$zip_file_name,$file_path);
	$message="<div class='alert alert-success'>File Downloaded Successfully..Thank You..</div>"; 
 }} ?>
