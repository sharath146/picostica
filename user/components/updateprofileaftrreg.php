<?php
//Page used to update the profile details of the user
session_start();
	$temp_username=$_SESSION['user_username'];
	require '../database/dbconnection.php';
	$finaldir='';
	$ImgExt='';
	$ImgType='';
	$response='';
	//turn on php error reporting
	error_reporting(E_ALL);
	ini_set('display_errors',1);
	if(isset($_REQUEST['Update-Button'])==1)
	{
		$prof=$_REQUEST['profession'];
		$addr=$_REQUEST['address'];
		$dob=$_REQUEST['dob'];
		$country=$_REQUEST['country'];
		$gender=$_REQUEST['gender'];
		$email=$_REQUEST['email'];
		$password=$_REQUEST['password'];
		$contactno=$_REQUEST['contactno'];
		$fname=$_REQUEST['firstname'];
		$lname=$_REQUEST['lastname'];
		$user_bio=$_REQUEST['bio'];
		$tempname=$_FILES['ImageFile']['tmp_name'];
		$ImgName=$_FILES['ImageFile']['name'];
		$ImgType=$_FILES['ImageFile']['type'];
		$ImgError=$_FILES['ImageFile']['error'];
		$ImgSize=$_FILES['ImageFile']['size'];
		$ImgExt=strtolower(pathinfo($ImgName,PATHINFO_EXTENSION));//Get the image Extension
		switch($ImgError)
		{
			case UPLOAD_ERR_OK: $valid=true;
			//Validate  File Extensions
			if(!in_array($ImgExt,array('jpg','jpeg','png')))
			{
				$valid=false;
				$response='Invalid File Extension!!!';
			}
			//validate file size
			if($ImgSize/1024/1024>2)
			{
				$valid=false;
				$response='File size is exceeding maximum allowed size';
			}
			//Upload File
			if($valid)
			{
				$RandomNum=rand(0,9999999999);//Create a random number
				$NewImageName=$RandomNum."-".$temp_username.".".$ImgExt;
				$finaldir=$NewImageName;
				$file_dir='../userfiles/avatars/'.$NewImageName;//Directory path where avatar image will be stored
				$uploadstatus=move_uploaded_file($tempname,$file_dir);//move the uploaded file to the specified directory
			}
			 break;
                case UPLOAD_ERR_INI_SIZE:
                    $response = 'Maximum file size Exceeded!!';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $response = 'The uploaded file was only partially uploaded.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                	$res=mysqli_query($con,"SELECT * FROM user WHERE uname='$temp_username'");
                	if(mysqli_num_rows($res))
                	{
                		$ros=mysqli_fetch_array($res);
                		$finaldir=$ros['user_avatar'];
                	}
                	else
                	{
                		$finaldir='default.jpg';
                	}
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $response = 'Missing a temporary folder.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $response = 'Failed to write file to disk.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $response = 'File upload stopped by extension.';
                    break;
                default:
                    $response = 'Unknown error';
                break;
            }
            //Query to update the user details
            $sql4="UPDATE user SET fname='$fname',lname='$lname',password='$password',mobile_no='$contactno',user_avatar='$finaldir',email='$email',user_bio='$user_bio',dob='$dob',profession='$prof',gender='$gender',address='$addr',country='$country' WHERE uname='$temp_username'";
           mysqli_query($con,$sql4) or die(mysqli_error($con));
		         if(mysqli_affected_rows($con)){
		         	echo "<script>alert('Profile Updated Successfully!!');</script>";
           	        }
           	        else
           	        {
           	        	echo "<script>alert('Sorry Couldn't Update profile);</script>";
           	        }
           	    }
?>
