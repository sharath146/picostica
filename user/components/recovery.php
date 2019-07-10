<?php 
include 'dbconnection.php';
if(isset($_GET['backup']))
{
	$tablename=$_GET['backup'];
	$backupfile='d:/'.$tablename.'.$sql';
	$query="LOAD DATA INFILE '$backupfile' INTO TABLE $tablename";
	if(!mysqli_query($con,$query))
	{
		echo mysqli_error($con);
	}
	else
	{
		echo "<script>alert('".$tablename."Table Restored Successfully!');</script>";
	}
}

 ?>