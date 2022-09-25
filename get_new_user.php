<?php
/**
 * @Author: Sanjay bhatt
 * @Date:   2016-02-15 14:05:55
 * @Last Modified by:   sanjay
 * @Last Modified time: 2016-02-12 18:18:40
 */
ob_start();
session_start();
include("connection.php");

$user_name =  $_POST['user_name'] ;
$email = $_POST['email'] ;
$role =  $_POST['role'] ;
$pass = md5($_POST['pass']) ;
$c_pass =  $_POST['c_pass'] ;
$status = 'active';
 
				$query = mysqli_query($con,"SELECT max(clientid) as max_id FROM  pia_client_id ") ;
               //echo "SELECT max(clientid) as max_id FROM  pia_client_id ";

				$row = mysqli_fetch_array($query);
				//echo $row["max_id"];
				$maxid = $row["max_id"]+1;
				$agent_id="agent000".$maxid;
             //   echo $maxid;
               // echo "hi";
		
$query = mysqli_query($con,"insert into pia_login(username,password,email,agent_id,role,status,date_time) values('".$user_name."', '".$pass."','".$email."','".$agent_id."','".$role."','".$status."',NOW())");
$query111 = mysqli_query($con,"TRUNCATE TABLE pia_client_id");
$query11 = mysqli_query($con,"insert into pia_client_id (clientid,date_time) values('".$maxid."',NOW())");

if (!$query) {
	header("Location:user_list.php?s=0");
  
  } 
  
  else{
	
	header("Location:user_list.php?s=1");
}

ob_flush();


?>