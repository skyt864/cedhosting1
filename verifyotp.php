<?php  
session_start();
include('User.php');
include('Dbconnection.php');
include('header.php');

?>
<?php
if(isset($_POST['submit']))
{
    $User=new User();
    $Dbcon=new Dbconnection();
    $otpp=$_POST['otp'];
    $number=$_SESSION['Mob'];
    if($otpp==$_SESSION['otp'])
    {
    $sql=$User->myotpp($number,$Dbcon->conn);
    }
//    if($otpp==$_SESSION['otp'])
//    {
//     echo '<script>alert("you can now login!! Number verified");';
//     echo 'window.location.href= "login.php";';
//     echo '</script>';
//     }
else{
    echo '<script>alert("incorrect otp")</script>';

}
}
?>
<?php
if(isset($_POST['submitt']))
{
    $User=new User();
    $Dbcon=new Dbconnection();
    $otpp=$_POST['otpp'];
    $email=$_SESSION['email'];
// echo $_SESSION['otp'];

if($otpp==$_SESSION['OTP'])
{
    $sql=$User->myotp($email,$Dbcon->conn);
    echo "you are verified" ;
}
if($otpp==$_SESSION['OTP'])
{
    echo '<script>alert("you can now login!! e-MAIL verified");';
    echo 'window.location.href= "login.php";';
    echo '</script>';
}
else{
    echo '<script>alert("incorrect otp")</script>';

}
}
?>
<div class="content">
				<!-- registration -->
	<div class="main-1">
		<div class="container">
			<div class="register">
				 <div class="register-but">
		  	  <form action="verifyotp.php" method="POST"> 
				 <div class="register-top-grid">
					<h3>Verify Your  Details</h3>
					 <div>
					 	
						<span>Your Otp on mobile<label>*</label></span>
						<input type="number" name="otp"> 
					 </div>
					
					           <div class="clearfix"> </div>
				               
				      	
                                 <input type="submit" name ="submit" value="Verify">
                                 <div class="clearfix"> </div>
                                 <div>
                             </form>
                           

		  	  <form action="verifyotp.php" method="POST"> 
				 <div class="register-top-grid">
					<h3>Verify Your  Details</h3>
					 <div>
					 	
						<span>Your Otp on email<label>*</label></span>
						<input type="text" name="otpp"> 
					 </div>
					
					           <div class="clearfix"> </div>
				               
				      	
                                 <input type="submit" name ="submitt" value="Verify">
                                 <div class="clearfix"> </div>
                                 <div>
                             </form>
                   