<?php
//Function for login processing
	session_start();
	$errmsg='';
	include 'alert.php';
if(isset($_SESSION['user_username']))
{
	//if user has already logged in redirect to homepage
	//$user_username=$_SESSION['user_username'];
	header('location:../index.php');
}
//if not  logged in earlier
	if(isset($_REQUEST['login_button']))
	{
		require '../database/dbconnection.php';
		$username= mysqli_real_escape_string($con,$_REQUEST['username']);
		$password= mysqli_real_escape_string($con,$_REQUEST['password']);
		stripslashes($password);
		trim($password);
		stripslashes($username);
		trim($username); 
		if(empty($username))
		{
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Username Missing!!",
                     text: "Please fill It!",
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
		if(empty($password))
		{
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Password Missing!!",
                     text: "Please Fill it up!",
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
		//Query to update user and set user_status to 1 from 0
		$sql1="UPDATE user SET user_status=1 WHERE uname='$username'";
		//Query to retrieve password and username from user
		$sql="SELECT uname,password FROM user WHERE uname='$username' and password='$password'";
		$result=mysqli_query($con,$sql) or die(mysqli_errno());
		$trws=mysqli_num_rows($result);
		//If uname and password matches
		if($trws==1)
		{
			$rws=mysqli_fetch_array($result);
			//check whether the password is equal or not equal to database password and user entered password
			if($rws['password']!=$password)
			{
				?>
				<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Login Unsuccessfull!!",
                     text: "Invalid Password!",
                      type: "error",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
				<?php
				header('refresh:1;url=../../login.php');
				//if YES!
				//$errmsg= 'Invalid Username and Password!!';
			}
			else
			{
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Login Successfull!",
                     text: "Welcome",
                      type: "success",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../index.php";
                        });
                        });
                        </script>
			<?php
			mysqli_query($con,$sql1) or die(mysqli_error($con));
			//create sessions for username and password
			$_SESSION['user_username']=$rws['uname'];
			$_SESSION['user_password']=$rws['password'];
			//Redirect to home page
			header('refresh:1;url=../index.php');
			}
			?>
			<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Login Successfull!",
                     text: "Welcome user",
                      type: "success",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../index.php";
                        });
                        });
                        </script>
			<?php
			header('refresh:1;url=../index.php');
		}
		else
		{
			?>
			<script type="text/javascript">
           $(document).ready(function() {
                    swal({ 
                    title: "Invalid Login Credentials!",
                     text: "Please Check",
                      type: "error",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
			<?php
		//if there is no matching records found
		//$errmsg="User name and password not found";
		//redirect to login page
		header('refresh:1,url=../../login.php');
		}
	}
	else
	{
		header('location:../../login.php');
	}
//Display error message 
?>
