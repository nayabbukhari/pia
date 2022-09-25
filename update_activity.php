<?php
ob_start();
session_start();
$user=$_SESSION['user'];
							
							include("connection.php");
							
							$type =  $_POST['type'] ;
							$client =  $_POST['client'] ;
							
							
							$subject = $_POST['subject'] ;
							$clientid =  $_POST['clientid'] ;
							
							
							$email = $_POST['email'] ;
							$agent_name =  $_POST['agent_name'] ;
							
							
							$prospect_owner = $_POST['prospect_owner'] ;
							$id =  $_POST['id'] ;
							
							
							$section_name = $_POST['section_name'] ;
							$time = $_POST['time'] ;

							$now=date("Y-m-d H:i:s");
							echo $now;	
							
							$related_to = $_POST['related_to'] ;
							
							$due_date = $_POST['due_date'] ;
							if($due_date=='' || $due_date==null)
							{
							$due_date=$now;
							echo due_date;
							
							}
							else
							{
							$due_date = str_replace('/', '-', $due_date);
							$due_date = date('Y-m-d H:i', strtotime($due_date));
							echo due_date;
 							}

$sql=mysqli_query($con,"update pia_activities set type='".$type."',Subject='".$subject."',due_date='".$due_date."',date_time=now() where id='".$id."'");

echo "update pia_activities set type='".$type."',Subject='".$subject."',due_date='".$due_date."',date_time=now() where id='".$id."'";
   if($_GET['s']=='2')
 {
 header("location:view_activities.php?s=3&client=".$client);
 }
 else
 {
header("Location:activities.php?s=3");
}

ob_flush();

?>