<?php
ob_start();
include("connection.php");
$id =  $_GET['id'] ;
$user_name =  $_GET['user_name'] ;
$email = $_GET['email'] ;
$role =  $_GET['role'] ;
$phone = $_GET['phone'];
 $dob=$_GET['dob'];
				$a=explode("/", $dob);
				$day=$a[0];
				$month=$a[1];
				$year=$a[2];
				$d_o_b=$year."-".$month."-".$day;



$sql=mysqli_query($con,"update pia_login set username='".$user_name."',email='".$email."',role='".$role."',phone='".$phone."',d_o_b='".$d_o_b."',date_time=now() where id='".$id."'");

 echo "update pia_login set username='".$user_name."',email='".$email."',role='".$role."',phone='".$phone."',d_o_b='".$d_o_b."',date_time=now() where id='".$id."'";
header("location:profile.php?s=3");
exit();
ob_flush();
?>
