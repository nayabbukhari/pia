<?php
ob_start();
include("connection.php");
$id =  $_POST['id'] ;
$agent =  $_POST['agent'] ;
//var_dump($agent);
//echo '<br />';
$query11 = mysqli_query($con,"select * from pia_login where email='".$agent."'") ;
//var_dump($query11);

				while($row = mysqli_fetch_array($query11) ) {
$sql=mysqli_query($con,"update pia_leads set agent_name='".$row['username']."',prospect_owner='".$agent."',update_status='1' where id='".$id."'");
 //echo "update pia_leads set agent_name='".$row['username']."',prospect_owner='".$agent."' where id='".$id."'";

}


header("location:prospects.php?s=3");
exit();
ob_flush();
?>
