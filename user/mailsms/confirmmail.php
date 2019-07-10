<?php
error_reporting(0);
include '../components/alert.php';
require 'PHPMailer/PHPMailerAutoload.php';
//Mailing script for sending the confirmation email
$emailid=$_REQUEST['mail'];
$mailsubject=$_REQUEST['subject'];
$actual_link=$_REQUEST['actual_link'];
$fullname=$_REQUEST['flname'];
$header=$_REQUEST['tophead'];
$mailplaintext='';
$errormsg=$_REQUEST['err'];
$message  = "<html><body>";
      
      $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
      
      $message .= "<tr><td>";
      
      $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
        
      $message .= "<thead>
            <tr height='80'>
              <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Pic-O-Stica</th>
            </tr>
            </thead>";
        
      $message .= "<tbody>
            <tr align='center' height='50' style='font-family:Verdana, Geneva, sans-serif;'>
              <td style='background-color:#00a2d1; text-align:center;'>Thank You for Joining With Us...</td>
            </tr>
            
            <tr>
              <td colspan='4' style='padding:15px;'>
                <p style='font-size:20px;'>Hi' ".$fullname.",</p>
                <hr />
                <p style='font-size:25px;'>Click On the below link to activate Your Account...</p>
                <h3><a href='".$actual_link."'>Activate</a></h3>
              </td>
            </tr>
            </tbody>";
      $message .= "</table>";
      $message .= "</td></tr>";
      $message .= "</table>";
      $message .= "</body></html>";
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'picostica@gmail.com';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

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
$mail->AltBody = $mailplaintext;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    //header('refresh:1;url=../../login.php');
    exit;
}

	?>
	<script type="text/javascript">
            $(document).ready(function() {
                    swal({ 
                    title: "Registration Successfull!",
                     text: "Please check your email for comfirmation!",
                      type: "success",
                      showConfirmButton:false 
                        },
                        function(){
                      window.location.href ="../../login.php";
                        });
                        });
                        </script>
	<?php
	header('refresh:1;url=../../login.php');
?>