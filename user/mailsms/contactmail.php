<?php
//Mail script for sending feedback from user to the admin
error_reporting(0);
$uname=$_REQUEST['name'];
$emailid=$_REQUEST['email'];
$phone=$_REQUEST['tel'];
$dept=$_REQUEST['department'];
$msg=$_REQUEST['message'];
$title='Pic-O-Stica contact form- New Message from '.$uname;
$message='<html><body><p>Hey,You have received new message from your website. Check details below:</p>
		<br>Senders IP address: '.$_SERVER['REMOTE_ADDR'].'<br>Subject: Willing to contact you'.'<br>Name: '.$uname.'<br>E-mail: '.$emailid.'<br>Phone Number: '.$phone.'<br>Selected Department: '.$dept.'<br>Message: <br>'
		.$msg.'</body></html>';
$mailplaintext='';
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'infopicostica@gmail.com';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('noreply@picostica.com', 'Picostica');
$mail->addAddress('picostica@gmail.com', 'Contact');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('noreply@picostica.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $title;
$mail->Body    = $message;
$mail->AltBody = $mailplaintext;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    exit;
} 
?>
<script>
alert('Information sent Successfully!! Our Team will contact you shortly!!');
window.location='../../index.php';</script>";