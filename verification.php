
<?php
session_start();

include('header.php');
include('phpmailer/class.phpmailer.php');
include('phpmailer/class.smtp.php');
?>
<?php
if(isset($_POST['submit']))
{
	// echo ($_SESSION['user']['email']);
require 'PHPMailerAutoload.php';
require 'credential.php';
$mail = new PHPMailer;
$email=$_POST['email'];
// $_SESSION['user']['email']=$email;
$OTPP=rand(1000,9999);
$_SESSION['OTP']=$OTPP;
$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP(true);                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = "gate2020akash@gmail.com";                 // SMTP username
$mail->Password = "ilovemyparents";                           // SMTP password
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
$mail->Body    =  $OTPP.'this is your otp';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
	echo 'otp send';
	// echo 'window.location.href= "login.php";';
}
}
if(isset($_POST['number']))
{
	$otp=rand(1000,9999);
     $_SESSION['otp']=$otp;
	$mobile=$_POST['number'];
	$_SESSION['Mob']=$mobile;
	// echo $mobile;
$fields = array(
"sender_id" => "FSTSMS",
"message" => "aaa".$otp,
"language" => "english",
"route" => "p",
"numbers" => $mobile,
);

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_SSL_VERIFYHOST => 0,
CURLOPT_SSL_VERIFYPEER => 0,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => json_encode($fields),
CURLOPT_HTTPHEADER => array(
"authorization: qpSFoJT9iZrzK7wdEvR3DhXfusIWGLYlbVPCMcOamjN4Uytgx0yFI8js6TKGcnrH0kA5f3VOEeQvP7a1",
"accept: */*",
"cache-control: no-cache",
"content-type: application/json"
),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
echo $response;
// header('location:')
}
}


// if(isset($_POST['Mobile']))
// {
// 	// echo "aa";
// $number=$_POST['number'];
// echo $number;
// }
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
						<input type="text" name="email" id="email"> 
					 </div>
					
					           <div class="clearfix"> </div>
				               
				      	
                                 <input type="submit" name ="submit" value="Verify">
                                 <div class="clearfix"> </div>
                                 <div>
                             </form>
					<div>
					 	<form action="verification.php" method="POST">
						<span>Mobile Number<label>*</label></span>
						<input type="text" name="number" id="number"> 
					 </div>
					
					           <div class="clearfix"> </div>
				               
				      	
                                 <input type="submit" name ="Mobile" value="send">
                                 <div class="clearfix"> </div>
                                 <div>
							 </form>
							 
							 <script>
				    var e = '<?php echo $_SESSION['user']['email']; ?>';
					var p = '<?php echo $_SESSION['user']['mobile']; ?>';
				    document.getElementById("email").value=e;
					document.getElementById("number").value=p;
				</script>
				