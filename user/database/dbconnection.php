<?php
//connection variable
$server = "localhost";
$user = "root";
$password="";
$db = "picostica";

//connecting to db 
$con = mysqli_connect($server,$user,$password,$db);

//Check Connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL:". mysqli_connect_errno;
}
?>