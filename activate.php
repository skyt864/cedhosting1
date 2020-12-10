<?php
include('User.php');
include('Dbconnection.php');
if(isset($_GET['email']))
{
    $email=$_GET['email'];
    echo $email;
    $User=new User();
    $Dbcon=new Dbconnection();

    $sql=$User->myotp($email,$Dbcon->conn);
    echo "you are verified" ;
//    header('location:login.php');
}
?>