<?php
//This page will send a mail to the admin when a user needs to send him contact details 
if(isset($_REQUEST['contact-submit']))
{
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['tel'];
$dept=$_REQUEST['department'];
$msg=$_REQUEST['message'];
$title='Pic-O-Stica contact form- New Message from '.$name;
$message='Hey,You have received new message from your website. Check details below:
		Senders IP address: '.$_SERVER['REMOTE_ADDR'].'Subject: Willing to contact you'.'Name: '.$name.'E-mail: '.$email.'Phone Number: '.$phone.'<br>Selected Department: '.$dept.'Message: '
		.$msg;
		//redirect to mailing page with required parameters
		header('location:../mailsms/contactmail.php?mail='.$email.'&name='.$name.'&title='.$title.'&msg='.$message);
}
?>