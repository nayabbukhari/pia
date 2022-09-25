<?php
ob_start();
include("connection.php");
$sql=mysqli_query($con,"delete from pia_files where id='".$_GET['id']."'");

echo "delete from pia_leads where id='".$_GET['id']."'";

header("location:files.php?s=2");
exit();
ob_flush();
?>