<?php
ob_start();
session_start();
$user=$_SESSION['user'];
include("connection.php");
$email = $_GET["q"];


$query = mysqli_query($con,"select * from pia_login where email='".$email."'");
//echo "select * from pia_login where email='".$user."' AND password ='".$password."' ";
$num_rows = mysqli_num_rows($query);
if($num_rows == '1')
{
//echo "yes";
?>
E-mail already exists!
<style>
.btn.check {
  opacity: 0.65; 
  cursor: not-allowed;
  display:none;
}

</style>
<?php
}
else
{
//echo $num_rows;
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

ob_flush();
?>