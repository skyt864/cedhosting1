<?php 

include('header.php');
include('phpmailer/class.phpmailer.php');
include('phpmailer/class.smtp.php');
?>
<?php
if(isset($_POST['submit']))
{
require 'PHPMailerAutoload.php';
require 'credential.php';
$mail = new PHPMailer;
$email=$_POST['email'];
$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP(true);                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "gate2020akash@gmail.com";                 // SMTP username
$mail->Password = "";                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom("gate2020akash@gmail.com", 'AKASH TIWARI');
$mail->addAddress($email);     // Add a recipient
               // Name is optional
$mail->addReplyTo("gate2020akash@gmail.com");


// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
?>
			<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
				 <div class="register-but">
		  	  <form action="verification.php" method="POST"> 
				 <div class="register-top-grid">
					<h3>Verify Your Details</h3>
					 <div>
					 	
						<span>Email<label>*</label></span>
						<input type="text" name="email"> 
					 </div>
					
					           <div class="clearfix"> </div>
				               
				      	
                                 <input type="submit" name ="submit" value="Verify">
                                 <div class="clearfix"> </div>
                                 <div>
                             </form>
					<div>
					 	<form action="verification.php" method="POST">
						<span>Mobile Number<label>*</label></span>
						<input type="text" name="user_name"> 
					 </div>
					
					           <div class="clearfix"> </div>
				               
				      	
                                 <input type="submit" name ="submit" value="Verify">
                                 <div class="clearfix"> </div>
                                 <div>
                             </form>