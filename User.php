
<?php


// if(!(session_id())) {
// 	session_start();
//   }

Class User {


function Register($email,$username,$mobile,$password,$repassword,$question, $answer,$conn){

// echo "aaaa";
$sql1="SELECT * FROM `tbl_user` WHERE `email` ='$email' OR `mobile`=$mobile";
$result=$conn->query($sql1);
if($result->num_rows > 0)
{
	echo '<script>alert("Record already Exists")</script>';
return 0;
	}

	$sql= "INSERT INTO `tbl_user` (`email`,`name`, `mobile`, `email_approved`,`phone_approved`,
	             `active`,`is_admin`, `sign_up_date`,`password`,`security_question`,`security_answer`) VALUES ('$email','$username','$mobile',0,0,0,0, NOW(), '$password','$question','$answer')";
				 $result1 = $conn->query($sql); 
				 
	             // header('location:account.php');
				 $_SESSION['user']=array('email'=>$email,
				 'name'=>$name,
				 'mobile'=>$mobile,
			 );
	        
	         return $result1;


}

function login($username, $password,$conn){
		$sql= "SELECT * from `tbl_user` WHERE `email`='$username' and `password`='$password'";
		
		
		
	    $result=$conn->query($sql);
	    // print_r($result);
	   
	   
		 $row = $result -> fetch_assoc();	
		if($result->num_rows > 0){
	        $_SESSION['LOGGEDIN']= true;

			$_SESSION['EMAIL'] = $username;
            // echo $_SESSION['EMAIL'];
			// $_SESSION['id']=$row['user_id'];
		 $_SESSION['active']=$row['active'];
			// echo $row['active'];
			$_SESSION['password']=$row['password'];
			$_SESSION['isadmin']=$row['is_admin'];
		}
		
     if($username==$_SESSION['EMAIL']&&$password==$_SESSION['password']&&$_SESSION['active']=='1'&&$_SESSION['isadmin']=='0')
     {
			$rtn ="login success";
			echo '<script>alert("successful login !! "); 
			window.location.href= "index.php";</script>';

		}
	elseif($username==$_SESSION['EMAIL']&&$password==$_SESSION['password']&&$_SESSION['active']=='1'&&$_SESSION['isadmin']=='1')
     {
			$rtn ="login success";
			echo '<script>alert("successful login !! "); 
			window.location.href= "admin/index.php";</script>';

		}
		else
		{
			$rtn="login failed";
			echo '<script>alert("lOGIN credentials didnt matched please register !! ")</script>'; 

		}
		return $rtn;

	}
	function myotp($email,$conn)
	{
		$sql= "UPDATE `tbl_user` SET `active`='1',`email_approved`='1'  WHERE `email`='$email'";
		$result=$conn->query($sql);
		return 1;
	}
	function myotpp($number,$conn)
	{

		$sql= "UPDATE `tbl_user` SET `active`='1',`phone_approved`='1'  WHERE `mobile`='$number'";
		$result=$conn->query($sql);
		return 1;
	}
	function Category($name,$plink,$conn)
	{

		if($name==""||$plink=="")
		{
			echo '<script>alert("null not allowed")</script>';
			return 1;
		}
		else{
		$sql= "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES ( '1', '$name', '$plink', '1', NOW())";
		$result=$conn->query($sql);
		return 1;
	}


}
function categorytable($name,$plink,$conn)
	{

		$sql1="SELECT * FROM `tbl_product`WHERE `prod_name`!='Hosting'";
		$result=$conn->query($sql1);
		return $result;
	}
	function deleteCategory($id,$conn)
	{

		$sql1="DELETE  FROM `tbl_product` WHERE `id`= '$id'";
		$result=$conn->query($sql1);
		return $result;
	}
	function editCategory($id,$conn)
	{

		$sql1="SELECT * FROM `tbl_product` WHERE `id`= '$id'";
		$result=$conn->query($sql1);
		return $result;
	}
	function updateCategory($id,$name,$link,$conn)
	{

		$sql1="UPDATE `tbl_product` SET `prod_name`='$name', `link`='$link' WHERE `id`='$id'";
		$result=$conn->query($sql1);
		
		return $result;
	}
	function navHost($conn)
	{

		$sql1="SELECT * FROM `tbl_product` WHERE `prod_name`!='Hosting'";
		$result=$conn->query($sql1);
		
		return $result;
	}
}
?>