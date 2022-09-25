<?php
session_start();
$user=$_SESSION['user'];
if(!isset($user))
{
header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:16:52 GMT -->
<head>
<meta charset="utf-8">
<title>Probatio Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
	
	<!-- Font Awesome-->
	<link href="css/font-awesome.min.css" rel="stylesheet">

	<link href="css/merge.css" rel="stylesheet">

  <style>
   thead {
    background: #3aa2c9 !important;
    color: #fff !important;
}</style>
</head>

<body class="overflow-hidden">
<!-- Overlay Div -->
  <!--___________________________overlay_________________________-->
  <?php include("overlay.php"); ?>
  <!--___________________________.overlay________________________-->


<!-- /theme-setting -->

<div id="wrapper" class="preload">
  <!--___________________________topbar_________________________-->
  <?php include("topbar.php"); ?>
  <!--___________________________.topbar________________________-->
  
  <!-- /top-nav-->
  
  <!--___________________________left sidebar_________________________-->
  <?php include("leftsidebar.php"); ?>
  <!--___________________________.left sidebar________________________-->
<?php 
include("connection.php");
$query = mysqli_query($con,"select * from pia_login where email='".$user."'") ;
$i = 1;
while($row1 = mysqli_fetch_array($query) ) {?> 
  <div id="main-container">
    <div id="breadcrumb">
      <ul class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
        <li class="active">Prospects</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
     <div class="clearfix"></div>
   <div class="padding-md clearfix"><?php
                include("connection.php");
                $_result1=mysqli_query($con,"select count(*) from pia_leads where prospect_owner='".$user."'  and update_status='0'");
                while($row=mysqli_fetch_array($_result1))
                {
                $cnt=$row[0];
				//echo $cnt;
                }
                ?>  <?php /* if($cnt<1){*/if($row1['role']=='AGENTS'){?> <a class="btn btn-success" style="" href="create_prospect.php"><img style="width: 30px; margin-top: -5px; margin-bottom: -5px;"src="icons/Prospects 1.png"  />&nbsp;Create new prospect</a> &nbsp;&nbsp;&nbsp;<a class="btn btn-success" style="" href="#check" data-toggle="modal"><i class="fa  fa-upload fa-lg"></i>&nbsp;Import prospects</a><?php } /*}*/if($row1['role']=='SUPERVISORS'){?><a class="btn btn-success" style="" href="import_leads.php"><i class="fa  fa-upload fa-lg"></i>&nbsp;Import prospects</a><?php } ?></div>
    <div class="clearfix"></div>
                                   <!--Modal-->
  <div class="modal fade" id="check">
    <div class="modal-dialog">
                      <form action="update_import.php" method="post">
<input type="hidden" name="agent" value="<?php echo $user; ?>" >
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center;">Import Prospects?</h4>
        </div>

        <div class="modal-body">
            <div class="form-group" style="text-align: center;">
              <label for="folderName">Are you sure you want to Import Prospects? This action can't be undone.</label>
            </div>
        </div>

        <div style="text-align:center;" class="modal-footer">
          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
          <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
          </div>
      </div>
      <!-- /.modal-content --> 
                        </form>
    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
<div class="panel panel-default table-responsive">
					<div class="panel-heading">
<strong>						Prospects
</strong>					</div>
					<div class="padding-md clearfix">
						<table class="table table-striped" id="dataTable">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Full name</th>
									<th>Phone number</th>
                                    <th>Email</th>
									<th>Products</th>
									<th>Effective Date</th>
									<th><div align="center">Assign Agent</div></th>
									<th>Updated</th>
                                     <?php 
				if($row1['role']=='SUPERVISORS' || $row1['role']=='SUPER ADMINISTRATORS')
				{
				?>
									<th>Referral ID</th>
									<?php 
                                    
                                    }
else
{
?>

<th>&nbsp;</th>
<?php
}
                                    ?>
								</tr>
							</thead>
							<tbody>

				<?php 
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				
				if($row1['role']=='AGENTS')
				{
								$query = mysqli_query($con,"select * from pia_leads where prospect_owner='".$user."' and update_status='0' order by date_time desc") ;
								//echo "select * from pia_leads where prospect_owner='".$user."' order by date_time desc";

				}
				
				else
				{
				$query = mysqli_query($con,"select * from pia_leads where update_status in(2) order by date_time desc") ;
				}
                $i = 1;
				while($row = mysqli_fetch_array($query) ) {
				$phone= $row['phone'];
				 $a1=explode(",", $phone);
				$ph=$a1[0];
				
				$products= $row['products'];
				

				?> 		
                <tr>
                <td><a style="font-size: 14px;" href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
                <td><?php echo $row['firstname']."&nbsp;".$row['lastname'] ;?></td>
                <td><?php echo $ph; ?></td>
                 <td><?php echo $row['email']; ?></td>
                <td><?php echo $products; ?></td>
                <td><?php echo $row['effectivedate']; ?></td>
                <?php 
				if($row1['role']=='AGENTS')
				{
				?>
               <td><?php echo $row['agent_name']; ?></td> 
               <?php 
				
				}
				
				else{
                ?>
                <td><div align="center"><?php  if($row['agent_name']=='' || $row['agent_name']==null){?><a href="#Assign<?php echo $row['id']; ?>" style="padding: 5px 21px;" data-toggle="modal" class="btn btn-xs btn-danger">Assign</a><?php }else{?><a href="#Assign<?php echo $row['id']; ?>" style="padding: 5px 15px;background: rgb(62, 194, 145);border: 1px solid rgb(62, 194, 145);" data-toggle="modal" class="btn btn-xs btn-danger"> Assigned </a><?php } ?> </a></div></td>
				<?php
				}
				?>
                <td><?php echo $row['date_time']; ?></td>
                 <?php 
				if($row1['role']=='SUPERVISORS' || $row1['role']=='SUPER ADMINISTRATORS')
				{
				?>
                <td><?php echo $row['referral_id']; ?></td>
               <?php 
				
				}
				else
				{
				if($row['type']=='done')
				{
				?>
                <td>
                <a class="btn btn-success" style="" href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>" title="Edit"><img style="width: 30px; margin-top: -5px; margin-bottom: -5px;"src="icons/Prospects 1.png"  />&nbsp;Create</a>
              <!--  <a href="#aaaa<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger">Clear</a>   -->             </td>
              <?php
			  }
			  else
			  {
			  ?>
                <td>
                <a class="btn btn-success" style="padding-right: 29px;" href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>" title="Edit"><img style="width: 30px; margin-top: -5px; margin-bottom: -5px;"src="icons/Prospects 1.png"  />&nbsp;Edit</a>
              <!--  <a href="#aaaa<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger">Clear</a>   -->             </td>
              <?php
			  }
			  }
			  ?>
                </tr>
    
                                
                                 <!--Modal-->
  <div class="modal fade" id="aaaa<?php echo $row['id']; ?>">
    <div class="modal-dialog">
                      <form action="delete_prospect.php?id=<?php echo $row['id']; ?>" method="post">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center;">Remove this Prospect?</h4>
        </div>

        <div class="modal-body">
            <div class="form-group" style="text-align: center;">
              <label for="folderName">Are you sure you want to remove this Prospect? This action can't be undone.</label>
            </div>
        </div>

        <div style="text-align:center;" class="modal-footer">
          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
          <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
          </div>
      </div>
      <!-- /.modal-content --> 
                        </form>
    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
                                
                                            <!--Modal Assign-->
  <div class="modal fade" id="Assign<?php echo $row['id']; ?>">
    <div class="modal-dialog">
                      <form action="assign_agent.php?id=<?php echo $row['id']; ?>" method="post">
                <input type="hidden" value="<?php echo $row['id']; ?>" placeholder="Phone" class="form-control input-sm parsley-validated " data-required="true" name="id">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center;">Assign a Agent?</h4>
        </div>
<?php if($row['agent_name']=='' || $row['agent_name']==null){?><?php }else{ ?><div align="center" style="color: rgb(206, 88, 63); font-weight: 700;">Assigned Agent : <?php echo $row['agent_name']; ?></div><?php } ?>
        <div class="modal-body">
                    <div class="row">

                      <div class="col-md-3"></div>
              <div class="col-md-6">
            <div class="form-group" style="text-align: center;">
              <label for="folderName">Choose a agent for  this client.</label>
           <select class="form-control input-sm parsley-validated" data-required="true" required name="agent">
           <option value="">Select</option>
				<?php
				$query11 = mysqli_query($con,"select * from pia_login where role='AGENTS'") ;
				while($row = mysqli_fetch_array($query11) ) {
				?> 		
				   <option value="<?php echo $row['email']; ?>"><?php echo $row['username']; ?></option>
				  <?php
				  }
				  ?>
				</select>
            </div>
            </div>
             <div class="col-md-3"></div>
            </div>
        </div>

        <div style="text-align:center;" class="modal-footer">
          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
          <button type="submit" class="btn btn-danger btn-sm">Confirm</button>
          </div>
      </div>
      <!-- /.modal-assign --> 
                  </form>
                  </div>
                  </div>        
                                     
								<?php $i++; }?>
								
							</tbody>
						</table>
	  </div><!-- /.padding-md -->
				</div><!-- /panel -->



	</div>i
    <!-- /.padding-md --> 
  </div>
  <!-- /main-container --> 
  <?php
  }
  ?>
  <!-- Footer
        ================================================== -->
  <!--____________________footer___________________________-->
  <?php include("footer.php"); ?>
  <!--____________________footer___________________________--> 
 
</div>
<!-- /wrapper --> 

<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a> 

<!-- Logout confirmation -->

<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<!-- Jquery -->
	<script src="js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
 
	<!-- Datatable -->
	<script src='js/jquery.dataTables.min.js'></script>	
	
	<!-- Modernizr -->
	<script src='js/modernizr.min.js'></script>
	
	<!-- Pace -->
	<script src='js/pace.min.js'></script>
	
	<!-- Popup Overlay -->
	<script src='js/jquery.popupoverlay.min.js'></script>
	
	<!-- Slimscroll -->
	<script src='js/jquery.slimscroll.min.js'></script>
	
	<!-- Cookie -->
	<script src='js/jquery.cookie.min.js'></script>

	<!-- Endless -->
	<script src="js/endless/endless.js"></script>
	
	<script>
		$(function	()	{
			$('#dataTable').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
			$('#chk-all').click(function()	{
				if($(this).is(':checked'))	{
					$('#responsiveTable').find('.chk-row').each(function()	{
						$(this).prop('checked', true);
						$(this).parent().parent().parent().addClass('selected');
					});
				}
				else	{
					$('#responsiveTable').find('.chk-row').each(function()	{
						$(this).prop('checked' , false);
						$(this).parent().parent().parent().removeClass('selected');
					});
				}
			});
		});
	</script>
</body>

<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:17:34 GMT -->

</html>


<?php
if(isset($_GET['s']))
{
if($_GET['s']==1)
{
?>
<script>
alert("Sucessfully Added");
</script>
<?php
}
else if($_GET['s']==2)
{
?>
<script>
alert("Sucessfully Deleted");
</script>
<?php
}
else
{
?>
<script>
alert("Sucessfully Updated");
</script>
<?php
}
}
?>















<?php
if(isset($_GET['f']))
{
if($_GET['f']==2)
{
?>
<script>
alert("Sucessfully Imported Prospects");
</script>
<?php
}
else if($_GET['f']==3)
{
?>
<script>
alert("Right now no prospects is here !!!");
</script>
<?php
}
else
{
?>
<script>
//alert("Sucessfully Updated");
</script>
<?php
}
}
?>















