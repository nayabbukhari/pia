<?php
ob_start();
session_start();
$user=$_SESSION['user'];
include("connection.php");
$password = (md5($_GET["q"]));


$query = mysqli_query($con,"select * from pia_login where email='".$user."' AND password ='".$password."' ");
//echo "select * from pia_login where email='".$user."' AND password ='".$password."' ";
$num_rows = mysqli_num_rows($query);
if($num_rows == '1')
{
//echo "yes";
?>
<style>
.btn.check {
  opacity: 1; 
  cursor: pointer;
    display: inline;

}

</style>
<?php
}
else
{
//echo $num_rows;
?>

Password not matched

<style>
.btn.check {
  opacity: 0.65; 
  cursor: not-allowed;
  display:none;
}

</style>
<?php
}

ob_flush();
?>