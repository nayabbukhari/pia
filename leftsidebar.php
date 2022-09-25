<?php
session_start();
include("connection.php");
 $user=$_SESSION['user'];
 $query = mysqli_query($con,"select * from pia_login where email='".$user."'") ;
				while($row = mysqli_fetch_array($query) ) 
				
				{
				$permissions=$row['permissions'];
               $permission = explode(',',$permissions);

if (in_array("Apple", $permission))
{
echo "Match found";
}
else
{
  echo "Match not found";
}


				?> 	

<aside class="fixed skin-6">
    <div class="sidebar-inner scrollable-sidebar">
      <div class="size-toggle"> <a class="btn btn-sm" id="sizeToggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="btn btn-sm pull-right logoutConfirm_open"  href="#logoutConfirm"> <i class="fa fa-power-off"></i> </a> </div>
      <!-- /size-toggle 
      <div class="user-block clearfix"> <img src="<?php echo $row['path']; ?>" alt="User Avatar">
        <div class="detail"> <strong><?php
if (in_array("Dashboard", $permission))
{
echo "Match found";
}
else
{
  echo "Match not found";
}

 echo $user; ?></strong>
          <ul class="list-inline">
            <li><a href="#">Profile</a></li>
          </ul>
        </div>
      </div>-->
      <!-- /user-block -->
      <div class="main-menu">
        <ul>
			<?php
			//******************************************************Dashborad menu********************************************************************
            if (in_array("Dashboard", $permission))
            {
            //echo "Match found";
            ?>
            <li class="active"> <a href="dashboard.php"> <span class="menu-icon"> <img style="width: 36px;" src="icons/Dashboard.png"  /> </span> <span class="text"> Dashboard </span> <span class="menu-hover"></span> </a> </li>
            <?php
            }
            else
            {
            // echo "Match not found";
            }
			//******************************************************Dashborad menu********************************************************************
			
			//******************************************************Prospects menu********************************************************************

			
if (in_array("Prospects", $permission))
{
//echo "Match found";
?>
  <li class=""> <a href="prospects.php"> <span class="menu-icon"> <img style="width: 36px;" src="icons/Prospects 3.png"  /> </span> <span class="text"> Prospects </span> <span class="menu-hover"></span> </a> </li>

<?php
}
else
{
 // echo "Match not found";
 
}

			//******************************************************Prospects menu********************************************************************

			//****************************************************** Work Plan menu********************************************************************


if (in_array("Work Plan", $permission))
{
?>
 
        <!--   <li> <a href="user_management.php"> <span class="menu-icon"> <i class="fa fa-tasks fa-lg"></i> </span> <span class="text"> Work Plan</span> <span class="menu-hover"></span> </a>
            <ul class="submenu"> -->
              <!-- 								<li><a href="login.html"><span class="submenu-label">Sign in</span></a></li>
                                <li><a href="register.html"><span class="submenu-label">Sign up</span></a></li> -->
            <!-- </ul> 
          </li>-->

<?php
}
else
{
  //echo "Match not found";
}
			//****************************************************** Deals menu********************************************************************
			
		
		if (in_array("Work Plan", $permission))
{
?>
 
          <li> <a href="workplan.php"> <span class="menu-icon"> <img style="width: 33px; " src="icons/New Icons/Work Plan.png"  /> </span> <span class="text"> Work Plan</span> <span class="menu-hover"></span> </a>
            <!-- <ul class="submenu"> -->
              <!-- 								<li><a href="login.html"><span class="submenu-label">Sign in</span></a></li>
                                <li><a href="register.html"><span class="submenu-label">Sign up</span></a></li> -->
            <!-- </ul> -->
          </li>

<?php
}
else
{
  //echo "Match not found";
}
			//****************************************************** Deals menu********************************************************************
			
			
			//****************************************************** History menu********************************************************************

if (in_array("History", $permission))
{
//echo "Match found";
?>
       <li > <a href="history.php"> <span class="menu-icon"> <img style=" width: 36px;" src="icons/History.png"  />  </span> <span class="text">History</span> <span class="menu-hover"></span> </a>
            <ul class="submenu">
              <!-- <li><a href="ui_element.html"><span class="submenu-label">UI Features</span></a></li> -->
            </ul>
          </li>
<?php
}
else
{
 // echo "Match not found";
}
			//****************************************************** History menu********************************************************************
			
			//****************************************************** Activities menu********************************************************************

?>

<?php

if (in_array("Activities", $permission))
{
//echo "Match found";
?>

          <li> <a href="activities.php"> <span class="menu-icon"> <img style="width: 33px; " src="icons/New Icons/Work Plan.png"  /> </span> <span class="text"> Activities</span> <span class="menu-hover"></span> </a>
<?php
}
else
{
//  echo "Match not found";
}

//****************************************************** Activities menu********************************************************************
//****************************************************** Commissions menu********************************************************************

if (in_array("Commissions", $permission))
{
//echo "Match found";
?>

    
          <li> <a href="#"> <span class="menu-icon"> <img style=" width: 36px;" src="icons/Commissions.png"  /> </span> <span class="text"> Commissions </span> <span class="menu-hover"></span> </a> </li>
<?php
}
else
{
//  echo "Match not found";
}

//****************************************************** Commissions menu********************************************************************

			//****************************************************** Document Managemen menu********************************************************************



if (in_array("Document Management", $permission))
{
//echo "Match found";
?>

    
          <li> <a href="files.php"> <span class="menu-icon"><img style=" width: 36px;" src="icons/Last icon.png"  />  </span> <span class="text">Files </span> <span class="menu-hover"></span> </a> </li>
<?php
}
else
{
//  echo "Match not found";
}

//****************************************************** Document Managemen********************************************************************


//****************************************************** People menu********************************************************************





if (in_array("People", $permission))
{
//echo "Match found";
?>

       
 <li style="height: 25px;"> <a > <span class="menu-icon"></span> <span class="text">  </span> <span class="menu-hover"></span> </a> </li>

       
           <li > <a href="people.php"> <span class="menu-icon">  <img style=" width: 36px;" src="icons/People.png"  />  </span> <span class="text"> People </span> <span class="menu-hover"></span> </a></li>


<?php
}
else
{
//  echo "Match not found";
}

//****************************************************** People menu********************************************************************


//****************************************************** Scholaris menu********************************************************************


if (in_array("Scholaris", $permission))
{
//echo "Match found";
?>
 <li style="height: 25px;"> <a > <span class="menu-icon"></span> <span class="text">  </span> <span class="menu-hover"></span> </a> </li>

          
          <li> <a href="user_management.php"> <span class="menu-icon">  <img style="width: 36px;" src="icons/Scholaris.png"  /></span> <span class="text"> Scholaris </span><span class="menu-hover"></span> </a> </li>
     
          

<?php
}
else
{
  //echo "Match not found";
}

//****************************************************** Scholaris menu********************************************************************

?>
         
         
          
          
          <li class="openable"> <a href="#"> <span class="menu-icon">  <img style="width: 36px;" src="icons/Corporate Policies.png"  /></span> <span class="text"> Corporate Policies </span> <span class="menu-hover"></span> </a>
          <?php
		  //****************************************************** Email Notifications menu********************************************************************

		  
		  if (in_array("Email Notifications", $permission))
{
//echo "Match found";
?>
            <ul class="submenu">
             				
                 <li> <a href="email_notifications.php"> <span class="submenu-label"> <i class="fa fa-envelope fa-lg"></i>  Email Notifications</span>  <span class="menu-hover"></span> </a> </li>
                  </ul>
<?php
}
else
{
  //echo "Match not found";
}
//****************************************************** Email Notifications menu********************************************************************


?>
                     
          </li>
          
        </ul>
      </div>
      <!-- /main-menu --> 
    </div>
    <!-- /sidebar-inner --> 
  </aside>
  <?php
  }
  ?>
