<?php
ob_start();
include("connection.php");
$sql=mysqli_query($con,"delete from pia_login where id='".$_GET['i']."'");
header("location:user_list.php?s=2");
exit();
ob_flush();
?>