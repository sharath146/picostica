<?php
	session_start();//Start the session
	error_reporting(0);
	include '../database/dbconnection.php';//include database connection file
	$message=''; 
	include 'alert.php';
	//Activates only if the signup-button is triggered
	if(isset($_REQUEST['signup-button']))
	{
		$username=trim($_REQUEST['username']);
		$email=trim($_REQUEST['email']);
		$contactno=trim($_REQUEST['mobileno']);
		$firstname=trim($_REQUEST['firstname']);
		$lastname=trim($_REQUEST['lastname']);
		$password=trim($_REQUEST['password']);
		$confirm_password=trim($_REQUEST['confirm_password']);
		if($username==''||$email==''||$contactno==''||$firstname==''||$lastname==''||$password==''||$confirm_password='')
		{
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Inputs Cannot be blank!",
                     text: "Fill in informations!",
                      type: "warning",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
			<?php
			header('refresh:1;url=../../login.php');
		}
		elseif(filter_var($email,FILTER_VALIDATE_EMAIL)===false)
		{
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Email Address is not Correct!",
                     text: "Please Check!",
                      type: "warning",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
			<?php
			header('refresh:1;url=../../login.php');
		}
		elseif($password!=$confirm_password)
		{
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Password Doesnot Match!",
                     text: "Please Ensure...",
                      type: "warning",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
			<?php
			header('refresh:1,url=../../login.php');
		}
		
		//Query to check whether the username already exists or not!
		if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM user WhERE uname='$username'")))
		{
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Username Already Exists!!",
                     text: "Try Different username",
                      type: "warning",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
			<?php
			header('refresh:1,url=../../login.php');
		}
		if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM user WhERE email='$email'")))
		{
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Email ID already Exists!",
                     text: "Please ensure!",
                      type: "warning",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
			<?php
			header('refresh:1;url=../../login.php');
		}
		if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM user WhERE mobile_no='$contactno'")))
		{
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Mobile No. Already Exists!",
                     text: "Please Ensure!",
                      type: "warning",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
			<?php
			header('refresh:1;url=../../login.php');
		}
		if(!ctype_alpha($firstname)|| !ctype_alpha($lastname))
		{
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Only letters are allowed!",
                     text: "Please Ensure!",
                      type: "warning",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
			<?php
			header('refresh:1;url=../../login.php');
		}
		/*
		elseif(!preg_match('(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}', $password))
		{
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Password Did not meet the requirements!",
                     text: "Please Ensure!",
                      type: "warning",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>

			<?php
			header('refresh:1;url=../../login.php');
		}*/
		$type="PURCHASE";
		$status="INACTIVE";
		$id_key=md5($password);//convert the password into a 32 bit Unique character
		$sql4="SELECT id_key from user_confirm WHERE id_key='$id_key'";
		//Query checks whether the id_key generated is already existing or not
		$result4=mysqli_query($con,$sql4) or die(mysqli_error($con));

		//if YES! create a random number using rand() then md5 it.
		if(mysqli_num_rows($result4)>0)
		{
			$id_key=md5(rand(0,9999999999));
		}
			 //Query to insert records into table user
		$sql="INSERT INTO user(fname,lname,password,status,mobile_no,email,uname,type,user_avatar,user_status)VALUES('$firstname','$lastname','$password','$status','$contactno','$email','$username','$type','default.jpg',0)";
		$query = mysqli_query($con,$sql);
		$uid = mysqli_insert_id($con);
		//Query to insert records into table user_confirm
			$sqlll="INSERT INTO user_confirm(user_id,uname,id_key,email,join_time)VALUES($uid,'$username','$id_key','$email',now())";
			mysqli_query($con,$sqlll) or die(mysqli_error($con));
			//$otp=rand(0,9999);
			//Sending SMS message to Users Mobile
			//$get_status=sendsms($contactno);
			//include '../mailsms/sms.php';
			//sending confirmation mail to user
			$actual_link="http://$_SERVER[HTTP_HOST]"."/user/components/activation.php?id=".$id_key;
			$fulname=$firstname.' '.$lastname;
			$to=$email;
			//echo "<script>alert('Registration SuccessFull!!');</script>";
			$subject="User Account Activation Email";
			//$message="Click this link to activate your account. <a href='".$actual_link."'>Activate</a>";
			$mailHeaders="From:Admin";
			$err = "<H1><center>You have registered and the activation mail is sent to your email. Click the activation link to activate your account.</center></h1>";
			header('location:../mailsms/confirmmail.php?mail='.$to.'&subject='.$subject.'&actual_link='.$actual_link.'&tophead='.$mailHeaders.'&err='.$err.'&flname='.$fulname);
	}
	else
	{
	?>
	<script type="text/javascript">
		alert('Access Denied!!');
		window.location.href='../../index.php';
	</script>
	<?php
	}
?>