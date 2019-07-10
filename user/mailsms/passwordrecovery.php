<?php 
$pass=$_GET['pass'];
$fullname=$_GET['flname'];
$emailid=$_GET['mail'];
$mailsubject=$_GET['subject'];
$message=$_GET['message'];
$error=$_GET['err'];
$header=$_GET['header'];
require 'PHPMailer/PHPMailerAutoload.php';
include '../components/alert.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                           // Enable verbose debug output
$mail->isSMTP();                                  // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                           // Enable SMTP authentication
$mail->Username = 'picostica@gmail.com';// SMTP username
$mail->Password = '';// SMTP password
$mail->SMTPSecure = 'tls';
// Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                
// TCP port to connect to
$mail->setFrom('noreply@picostica.com', 'Picostica');
$mail->addAddress($emailid, $fullname);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('noreply@picostica.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $mailsubject;
$mail->Body    = $message.' '.$header;
//$mail->AltBody = $mailplaintext;

if(!$mail->send()) {
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
    ?>
    <script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Recovery Unsuccessfull!!",
                     text: "Mail couldn't be sent...",
                      type: "error",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
    <?
    if($_GET['type']=='admin')
  {
    header('refresh:1;url=../../admin/index.php');
  }
  else
  {
    header('refresh:1;url=../../login.php');
  }
} else {
	?>
	<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Recovery Successfull!",
                     text: "Please check your email for Recovered Password..",
                      type: "success",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
	<?php
  if($_GET['type']=='admin')
  {
    header('refresh:1;url=../../admin/index.php');
  }
  else
  {
    header('refresh:1;url=../../login.php');
  }
}


 ?>