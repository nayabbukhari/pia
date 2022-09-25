<?php
ob_start();
include("connection.php");
$id =  $_GET['id'] ;
$password = (md5($_GET["pass"]));

$sql=mysqli_query($con,"update pia_login set password='".$password."' where id='".$id."'");

 echo "update pia_login set password='".$password."' where id='".$id."'";
header("location:profile.php?s=4");
exit();
ob_flush();
?>
