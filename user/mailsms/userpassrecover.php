<?php

session_start();
require_once('../database/dbconnection.php');
$errormsg='';
if(isset($_REQUEST['Reset-Button']))
{
  if(!empty($_REQUEST['email']))
  {
  $email=mysqli_real_escape_string($con,$_REQUEST['email']);
  $sql="SELECT * FROM user WHERE email='$email'";
  $query_result=mysqli_query($con,$sql);
  $count=mysqli_num_rows($query_result);
  if($count==1)
  {
    $r=mysqli_fetch_array($query_result);
    $fullname=$r['fname'].' '.$r['lname'];
    $password=$r['password'];
    $to=$r['email'];
    $subject="Your Recovered Password";
    $message="Please use this password to login: ".$password."<br><p style=background-color:gold;text-align:center;color:white;>Click on the link to redirect to Pic-O-Stica Login Page <a href=localhost/picostica/login.php>Pic-O-Stica</a></p>";
    $mailerror="<body style=background-color:gold;margin:0 auto;><center><h2 style=background-color:gold;color=black;text-align=center>A Recovery E-Mail has been sent to ".$r['email']."</h2><br><p>Please check your e-mail for recovered password...</p></center></body>";
    $headers="From:admin@picostica.com";
    $type='user';
    header('location:passwordrecovery.php?pass='.$r[ 'password'].'&flname='.$fullname.'&mail='.$r['email'].'&subject='.$subject.'&message='.$message.'&err='.$mailerror.'&header='.$headers.'&type='.$type);
  }
  else
  {
    $errormsg="Email ID does not exist!!";
  }
}
else
{
  $errormsg="Email ID connot be empty!!";
}
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Password Recovery Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>

<body>
  <div class="login">
	<h1>Forgot Your Password?</h1>
	<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We are Here to Help You...</h3>
  <p style="text-align: center;color:red;"><?php echo $errormsg; ?></p>
    <form method="post">
    	<input type="text" name="email" placeholder="E-Mail" required/>
        <button type="submit" class="btn btn-primary btn-block btn-large" name="Reset-Button"><a style="text-decoration: none;color:white;">Recover Password</a></button>
    </form>
</div>
  
    <script src="js/index.js"></script>

</body>
</html>
