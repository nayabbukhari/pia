<?php
ob_start();
include("connection.php");
$sql=mysqli_query($con,"delete from pia_leads where id='".$_GET['id']."'");

echo "delete from pia_leads where id='".$_GET['id']."'";
 if($_GET['s']=='2')
 {
 header("location:history.php?s=2");
 }
 else
 {
header("location:leads.php?s=2");
}
exit();
ob_flush();
?>