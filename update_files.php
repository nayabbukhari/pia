<?php
ob_start();
include("connection.php");
$id =  $_POST['id'] ;

$file_name =  $_POST['file_name'] ;
$ex = $_POST['ex'] ;
$file=$file_name.'.'.$ex;
$des =  $_POST['des'] ;

$tags = $_POST['tags'] ;

$sql=mysqli_query($con,"update pia_files set file_name='".$file."',tags='".$tags."',description='".$des."',date_time=now() where id='".$id."'");

 echo "update pia_files set file_name='".$file."',tags='".$tags."',description='".$des."',date_time=now() where id='".$id."'";
header("location:files.php?s=3");
exit();
ob_flush();
?>
