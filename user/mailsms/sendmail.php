<?php
error_reporting(0);
$recipient=$_GET['to'];
$title=$_GET['sub'];
$message=$_GET['mes'];
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
$mail->addAddress($recipient);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('noreply@picostica.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $title;
$mail->Body    = $message;
//$mail->AltBody = $mailplaintext;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    echo "<script>alert('Couldn't Send Mail!!');window.location='../../admin/table/usernotify.php';</script>";
    exit;
}

	echo "<script>alert('Mail Sent Successfully!!');window.location='../../admin/table/usernotify.php';</script>";
?>