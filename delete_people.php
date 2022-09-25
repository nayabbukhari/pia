<?php
ob_start();
include("connection.php");
$sql=mysqli_query($con,"delete from pia_people where id='".$_GET['id']."'");

echo "delete from pia_people where id='".$_GET['id']."'";

header("location:people.php?s=2");
exit();
ob_flush();
?>