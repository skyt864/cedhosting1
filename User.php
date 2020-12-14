
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
	function myproducts($category,$name,$url,$a,$price,$annualprice,$sku,$conn)
	{
// echo "aaaa";
	 	$sql= "INSERT INTO `tbl_product`(`prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`) VALUES ( '$category', '$name', '$url', '1', NOW())";
		 $result=$conn->query($sql);
		   $lastid=$conn->insert_id;
		//  echo"bbbb";
		  if($result=true)
		  {
	//  echo "cccc";
	
		$sql1="INSERT INTO `tbl_product_description` ( `prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES ('$lastid', '$a', '$price', '$annualprice', '$sku')";
		$result=$conn->query($sql1);
		  }
		  else{
			  echo'<script>alert("not inserted")</script>';
        return $result;
		  }
	
}
    function tableview($conn)
{
$row=array();
       $sql3= "SELECT * FROM `tbl_product`
                  INNER JOIN `tbl_product_description`
              ON `tbl_product`.id=`tbl_product_description`.prod_id";
                          
		   $result=$conn->query($sql3);
		   while($data=mysqli_fetch_assoc($result))
		   {
			   $row[]=$data;
		   }
	 
	 
		   return $row;
                 
                  
                
                  
				}
				function deleteproducts($id,$conn)
				{
                      
					$sql3="SELECT `prod_id` FROM `tbl_product_description` WHERE `id`='$id'";
					$result=$conn->query($sql3);
					while($data=mysqli_fetch_assoc($result))
					{
						$row=$data['prod_id'];
						// echo $row;  //171
					}
					// echo $row;
					$sql1="DELETE  FROM `tbl_product_description` WHERE `id`= '$id'";
		           $result=$conn->query($sql1);
				   if($result=true)
				   {
					   $sql2="DELETE  FROM `tbl_product` WHERE `id`= '$row'";
					   $result2=$conn->query($sql2);
					   return $result2;
				   }
				   else
				   {
					   echo '<script>alert("product does exists anymore")</script>';
				   }
				}
				function editproducts($id,$conn)
				{
					$sql3="SELECT `prod_id` FROM `tbl_product_description` WHERE `id`='$id'";
					$result=$conn->query($sql3);
					while($data=mysqli_fetch_assoc($result))
					{
						$row=$data['prod_id'];
						 $a=$row;
						 
						// echo $row;  //171
					}
					// echo $a;
					
					// echo $row;
                $row=array();
					$sql="SELECT * FROM `tbl_product`
					INNER JOIN `tbl_product_description`
				ON `tbl_product`.id=`tbl_product_description`.prod_id WHERE `tbl_product`.id= '$a' AND `tbl_product_description`.id='$id'";
				$result=$conn->query($sql);
				while($data=mysqli_fetch_assoc($result))
		   {
			   $row[]=$data;
		   }
	 
	 return $row;
			}
			//UPDATE table_name
			//SET column1 = value1, column2 = value2, ...
			//WHERE condition;
			function myupdatedproducts($id,$valuee,$name,$url,$a,$price,$annualprice,$sku,$conn)
			{
				$sql="SELECT `prod_id` FROM `tbl_product_description` WHERE `id`='$id'";
				$result=$conn->query($sql);
				while($data=mysqli_fetch_assoc($result))
		   {
			   $row[]=$data;
			   $b=$data['prod_id'];
		   }
		   echo $b;
		  $sql4="UPDATE `tbl_product` SET `prod_name`='$name',`html`='$url',`prod_parent_id`='$valuee' WHERE `id`='$b'";
		  $result=$conn->query($sql4);
		  if($result=true)
		  {
			  $sql5="UPDATE `tbl_product_description` SET `description`='$a',`mon_price`='$price',`annual_price`='$annualprice',`sku`='$sku', WHERE `id`='$id'";
			  $result=$conn->query($sql5);
			  echo "updated";
		  }
		  return $result;
			}

			function parentname($category,$conn)
			{
				$row=array();
				$sql="SELECT `prod_parent_id` FROM `tbl_product` WHERE `prod_name` ='$category'";
				$result=$conn->query($sql);
				while($data=mysqli_fetch_assoc($result))
				{
					$row[]=$data;
					$b=$data['prod_parent_id'];
					
				}
				$sql4="SELECT `prod_name` FROM `tbl_product` WHERE `id`='$b'";
				$result=$conn->query($sql4);
				while($data=mysqli_fetch_assoc($result))
				{
					$row[]=$data;
					$c=$data['prod_name'];
					// echo $c;
			return $c;
			}
                
}
}


?>