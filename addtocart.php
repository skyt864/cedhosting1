<?php include('header.php'); 

if(isset($_GET['id']))
{
  $id=$_GET['id'];
  echo $id;
  $User=new User();
  $Dbcon=new Dbconnection();
  
   $sql=$User->addtocart($id,$Dbcon->conn);
   print_r($sql);
  

}



?>