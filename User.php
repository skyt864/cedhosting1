
<?php

session_start();

Class User {


function Register($email,$username,$mobile,$password,$repassword,$question, $answer,$conn){

// echo "aaaa";


	$sql= "INSERT INTO `tbl_user` (`email`,`name`, `mobile`, `email_approved`,`phone_approved`,
	             `active`,`is_admin`, `sign_up_date`,`password`,`security_question`,`security_answer`) VALUES ('$email','$username','$mobile',0,0,0,0, NOW(), '$password','$question','$answer')";
	             $result1 = $conn->query($sql); 
	             // header('location:account.php');
	         
	        
	         return $result1;


}

function login($username, $password,$conn){
		$sql= "SELECT * from `tbl_user` WHERE `email`='$username' and `password`='$password'";
		
		
		
	    $result=$conn->query($sql);
	    print_r($result);
	   
	   
		 $row = $result -> fetch_assoc();	
		if($result->num_rows > 0){
	        $_SESSION['LOGGEDIN']= true;

			$_SESSION['EMAIL'] = $username;

			// $_SESSION['id']=$row['user_id'];
			$_SESSION['myblock']=$row['email_approved'];
			
			$_SESSION['password']=$row['password'];
		}
		
     if($username==$_SESSION['EMAIL']&&$password==$_SESSION['password']&&$_SESSION['myblock']=='0')
     {
			$rtn ="login success";
			echo '<script>alert("successful login !! ")</script>'; 

		}
		else
		{
			$rtn="login failed";
			echo '<script>alert("lOGIN credentials didnt matched please register !! ")</script>'; 

		}
		return $rtn;

	}

}
?>