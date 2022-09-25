<?php
ob_start();
session_start();

// Turn off all error reporting
error_reporting(0);

include("connection.php");
$user_name=$_POST['username'];
//$password=$_POST['password'];

$password = (md5($_POST["password"]));

$query = mysqli_query($con,"select * from pia_login where email='".$user_name."' AND password ='".$password."' ");
echo "select * from pia_login where username='".$user_name."' AND password ='".$password."' ";
$num_rows = mysqli_num_rows($query);
if($num_rows == '1'){
$ip=$_SERVER['REMOTE_ADDR'];
echo $ip;
echo "<br/>";
$user_agent= $_SERVER['HTTP_USER_AGENT'];
echo $user_agent;

$query = mysqli_query($con,"select * from pia_login where email='".$user_name."' AND password ='".$password."'") ;
while($row = mysqli_fetch_array($query) ) { 
$query = mysqli_query($con,"insert into pia_login_history(username,email,role,ip_address,user_agent,date_time) values('".$row['username']."', '".$row['email']."','".$row['role']."','".$ip."','".$user_agent."',NOW())");
}

$_SESSION['user']=$user_name;
header("Location: dashboard.php");
} 
else 
{
header("Location: index.php?v=0");
}  

ob_flush();




?>