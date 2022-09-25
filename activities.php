<?php
session_start();
$user=$_SESSION['user'];
if(!isset($user))
{
header("location:index.php");
}
include("connection.php");
 $user=$_SESSION['user'];
 $query = mysqli_query($con,"select * from pia_login where email='".$user."'") ;
				while($row = mysqli_fetch_array($query) ) 
				
				{
				$role=$row['role'];
				//echo $role;
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
  .btn.btn-default.dropdown-toggle {
    border-radius: 25px;
	
}
.btn.btn-default.dropdown-toggle:hover {
    border-radius: 25px;
	background:#1a3347;
	color:#fff;
}
.dropdown-menu {
    top: -5px;
    left: -14px;
    border-radius: 23px;
    background: #1a3347;
    color: #fff;
    padding: 15px 8px 15px 8px;
}
.dropdown-menu li {
color:#fff;
text-align:center;

}
.dropdown-menu li a {
color:#fff;
text-align:center;
border-radius: 17px;
border: #fff solid 1px;
margin-top: 5px;
}
  .tab-bar li a {
    font-size: 14px !important;
    color: #2F80CF !important;
}

  .tab-bar .active  a {
    font-size: 14px !important;
    color: #333 !important;
}
  thead {
    background: #3aa2c9 !important;
    color: #fff !important;
}</style>
</head>
<style>

#dataTable_length {
    display: none;
}
#dataTable_filter {
    margin-top: -50px;
	float: left !important;
}
#dataTable1_length {
    display: none;
}
#dataTable1_filter {
    margin-top: -50px;
	float: left !important;
}
#dataTable2_length {
    display: none;
}
#dataTable2_filter {
    margin-top: -50px;
	float: left !important;
}
#dataTable3_length {
    display: none;
}
#dataTable3_filter {
    margin-top: -50px;
	float: left !important;
}
#dataTable4_length {
    display: none;
}
#dataTable4_filter {
    margin-top: -50px;
	float: left !important;
}
@media only screen and (max-width: 700px) {
#dataTable_filter {
    margin-top: 0px !important;
	float: left !important;
}
#dataTable1_length {
    display: none;
}
#dataTable1_filter {
    margin-top: 0px !important;
	float: left !important;
}
#dataTable2_length {
    display: none;
}
#dataTable2_filter {
    margin-top: 0px !important;
	float: left !important;
}
#dataTable3_length {
    display: none;
}
#dataTable3_filter {
    margin-top: 0px !important;
	float: left !important;
}
#dataTable4_length {
    display: none;
}
#dataTable4_filter {
    margin-top:  0px !important;
	float: left !important;
}

}


.tab-bar.right {
    background: #fff;
}
.tab-bar.right > li {
    border: #B7B7B7 solid 1px;
    border-right: none;

}
.tab-bar.right .active a {
    background: #A19D9D !important;
    color: #fff !important;
}
.btn.btn-xs.btn-danger {
    padding-top: 4px;
    padding-bottom: 4px;
}
.label-checkbox {
    text-transform: uppercase;
}
</style>
<link rel="stylesheet" type="text/css" href="build/jquery.datetimepicker.css"/>

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
  
  <div id="main-container">
    <div id="breadcrumb">
      <ul class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="dashboard.php"> Home</a></li>
        <li class="active">Activities</li>
                        <li class="active"><?php $page=basename($_SERVER['PHP_SELF']); $pa=explode(".", $page);		//echo $pa[0]; ?></li>

      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
     <div class="clearfix"></div>
    <div class="clearfix"></div>
<div class="panel panel-default table-responsive">
					<div class="panel-heading">
<strong>						Activities
</strong>					</div>
<div class="padding-md">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							
							<table class="table table-striped" id="dataTable_Recall">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Product</th>
									<th>Status</th>
									<th>Date Created</th>
									<th>Effective date</th>
									<th>Activity 1</th>
									<th>Activity 2</th>
									<th>Activity 3</th>
									<?php
                                    if($role=='AGENTS')
                                    {
                                    }
                                    else
                                    {
                                    ?>
                                    <th>Agent</th>
                                    <?php
                                    }
                                    ?>
									<th>Activity</th>
								</tr>
							</thead>
							<tbody>
<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				 if($role=='AGENTS')
                            {
							 $query = mysqli_query($con,"SELECT * FROM pia_leads WHERE FIND_IN_SET('Recall', status) and prospect_owner='".$user."' order by date_time desc") ;
                            }
                            else
                            {
				$query = mysqli_query($con,"SELECT * FROM pia_leads WHERE FIND_IN_SET('Recall', status) order by date_time desc") ;
				}
				while($row = mysqli_fetch_array($query) ) {
				$phone= $row['phone'];
				 $a1=explode(",", $phone);
				$ph=$a1[0];
				
								
										$products=$row['products'];
										$product=explode(",", $products);			
										
										$insurer=$row['insurer'];
										$in=explode(",", $insurer);			
										
										$Others=$row['Others'];
										$Oth=explode(",", $Others);			
										
										$Capitale=$row['Capitale'];	
										$Cap=explode(",", $Capitale);			
										$status=$row['status'];
										$st=explode(",", $status);
										$b2=sizeof($st);
										//echo $b2;
											
											$date=$row['date_time']; 
											$create=explode(" ", $date);
									?>
										
                                            <tr>
                                            <td><?php echo $row['clientid']; ?></td>
                                            <td><?php echo $products; ?></td> 
                                            <td><?php echo $status;?></td>
                                            <td><?php echo $create[0]; ?></td>
                                            <td><?php echo $row['effectivedate']; ?></td>
                                            <td><?php echo $row['activity1']; ?></td>
                                            <td><?php echo $row['activity2']; ?></td>
                                            <td><?php echo $row['activity3']; ?></td>
											<?php
                                            if($role=='AGENTS')
                                            {
                                            }
                                            else
                                            {
                                            ?>
                                            <td><?php echo $row['agent_name']; ?></td>
                                            <?php
                                            }
                                            ?>
                                            <td>
											<?php 
                                            $query1111 = mysqli_query($con,"SELECT MAX(id) as maxid FROM pia_activities where clientid='".$row['clientid']."' and  not type='notes'  order by date_time desc") ;
                                            while($row_max = mysqli_fetch_array($query1111) ) {
                                            if($row_max['maxid']=='' || $row_max['maxid']==null)
										  {
?>
                                            <div class="input-group-btn">
                                            
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Never Spoke <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                            <li>Never spoke </li>
                                            
                                            
                                            <li class="divider"></li>
                                            <li><a href="#formModal<?php echo $row['id']; ?>" role="button" data-toggle="modal" >Add Activity</a></li>
                                            <li><a href="#newFolder<?php echo $row['id']; ?>" role="button" data-toggle="modal" >Add Note</a></li>
                                            <li class="divider"></li>
                                            <li><a href="view_activities.php?client=<?php echo $row['clientid']; ?>"  role="button"  >View all activities</a></li>	
                                            </ul>
                                            </div><!-- /btn-group -->

<?php										  }
											else
											{
											//  echo "not null";
											
											//echo $row_max['maxid'];
											$query22 = mysqli_query($con,"SELECT * FROM pia_activities WHERE clientid='".$row['clientid']."' and id='".$row_max['maxid']."' and  not type='notes'  order by date_time desc") ;
											
											//echo "SELECT * FROM pia_activities WHERE clientid='".$row['clientid']."' and id='".$row_max['maxid']."' and  not type='notes'  order by date_time desc";
											while($row22 = mysqli_fetch_array($query22) ) {
											$due=$row22['due_date'];
											$due_date=explode(" ",$due);
											?>
                                            <div class="input-group-btn">
                                            
                                            
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo $row22['due_date'];?> <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                            <li><a style="border: medium none;" href="#edit<?php echo $row22['id']; ?>" role="button" data-toggle="modal" ><?php echo $row22['due_date'];?></a></li>
                                            <li class="divider"></li>
                                            <li style="text-align: left;"><?php echo $row22['type'];?></li>
                                            
                                            <li><a href="#formModal<?php echo $row['id']; ?>" role="button" data-toggle="modal" >Add Activity</a></li>
                                            <li><a href="#newFolder<?php echo $row['id']; ?>" role="button" data-toggle="modal" >Add Note</a></li>
                                            <li class="divider"></li>
                                            <li><a href="view_activities.php?client=<?php echo $row['clientid']; ?>" role="button">View all activities</a></li>	
                                            </ul>
                                            </div><!-- /btn-group -->
                                                        
                                 <!--Modal-->
  <div class="modal fade" id="edit<?php echo $row22['id']; ?>">
    <div class="modal-dialog">
                     	<form method="post" action="update_activity.php">

    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 style="text-align: center; font-weight: 700;">New Activity</h4>
      				</div>

				    <div class="modal-body">
														<div class="row">

                            <div class="col-md-3" style="padding-right: 0px;">
									<div class="form-group">
										<label>&nbsp;</label>
                                        <select class="form-control" name="type">
                                        <option value="call"><i class="fa  fa-mobile-phone"></i> CALL</option>
                                        <option value="other"><i class="fa fa-flag"></i> OTHER</option>
                                        
                                        </select>	
														</div>
								</div><!-- /.col -->
								<div class="col-md-9">
									 <div class="form-group">
								<label>Subject</label>
                    <input type="text" class="form-control input-sm" name="subject" value="<?php echo $row22['Subject'];?>" placeholder="Subject">
                    <input type="hidden" class="form-control input-sm" value="<?php echo $row22['id']; ?>" name="id" placeholder="Subject">
                
							</div><!-- /form-group -->
                            
                            	</div>
								</div><!-- /.col -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Due date</label>
<div class="input-group">
										<input type="text"  name="due_date" id="date<?php echo $row['id']; ?>" value="<?php echo $due; ?>" readonly class="datepicker form-control">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>									</div>
								</div>
                                <!-- /.col 
								<div class="col-md-6">
									<div class="form-group">
										<label>Time</label>
<div class="input-group bootstrap-timepicker">
										<input class="timepicker form-control" name="time" type="text"/>
										<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
									</div>									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->
							
							  <div class="form-group">
								<label>Related To</label>
								<input type="text" class="form-control input-sm" value="<?php echo $row['firstname']; ?>" name="related_to" readonly placeholder="test@example.com">
							</div><!-- /form-group -->
							<div class="form-group">
								<label>Owner</label>
								<input type="text" class="form-control input-sm" value="<?php echo $row['agent_name']; ?>" name="owner" readonly placeholder="test@example.com">
							</div><!-- /form-group -->
                          
                           
				    </div>
				    <div class="modal-footer">
				        <button type="submit" class="btn btn-danger btn-sm" aria-hidden="true">Save</button>
				        <button class="btn btn-success btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
				    </div>
			  	</div><!-- /.modal-content -->
                        						</form>

    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal -->    
                                        
               <?php 
			   } 
			   }
			   } /* if($role=='AGENTS' || $role=='SUPERVISORS'){?> <a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a><?php } else { ?>  &nbsp;&nbsp;    <a href="#call<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-xs btn-danger">Clear</a>     <?php } */ ?>           </td>
                </tr>
                
                                                
                                 <!--Modal-->
  <div class="modal fade" id="call<?php echo $row['id']; ?>">
    <div class="modal-dialog">
                      <form action="delete_prospect.php?id=<?php echo $row['id']; ?>&s=2" method="post">

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
            
      
  <div class="modal fade" id="formModal<?php echo $row['id']; ?>">
  			<div class="modal-dialog">
                                                						<form method="post" action="get_activity.php">

    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 style="text-align: center; font-weight: 700;">New Activity</h4>
      				</div>

				    <div class="modal-body">
														<div class="row">

                            <div class="col-md-3" style="padding-right: 0px;">
									<div class="form-group">
										<label>&nbsp;</label>
<select class="form-control" name="type">
										<option value="call"><i class="fa  fa-mobile-phone"></i> CALL</option>
										<option value="other"><i class="fa fa-flag"></i> OTHER</option>
										
									</select>	
														</div>
								</div><!-- /.col -->
								<div class="col-md-9">
									 <div class="form-group">
								<label>Subject</label>
                    <input type="text" class="form-control input-sm" name="subject" placeholder="Subject">
                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['clientid']; ?>" name="clientid" placeholder="Subject">
                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['email']; ?>" name="email" placeholder="Subject">
                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['agent_name']; ?>" name="agent_name" placeholder="Subject">
                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['prospect_owner']; ?>" name="prospect_owner" placeholder="Subject">
                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['status']; ?>" name="status" placeholder="Subject">
                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['section_name']; ?>" name="section_name" placeholder="Subject">
							</div><!-- /form-group -->
                            
                            	</div>
								</div><!-- /.col -->
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Due date</label>
<div class="input-group">             
	<input type="text" value="" name="due_date"  readonly id="datetimepicker<?php echo $row['id']; ?>" class="form-control"/>

										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>									</div>
								</div><!-- /.col 
								<div class="col-md-6">
									<div class="form-group">
										<label>Time</label>
<div class="input-group bootstrap-timepicker">
										<input class="timepicker form-control" name="time" type="text"/>
										<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
									</div>									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->
							
							  <div class="form-group">
								<label>Related To</label>
								<input type="text" class="form-control input-sm" value="<?php echo $row['firstname']; ?>" name="related_to" readonly placeholder="test@example.com">
							</div><!-- /form-group -->
							<div class="form-group">
								<label>Owner</label>
								<input type="text" class="form-control input-sm" value="<?php echo $row['agent_name']; ?>" name="owner" readonly placeholder="test@example.com">
							</div><!-- /form-group -->
                          
                           
				    </div>
				    <div class="modal-footer">
				        <button type="submit" class="btn btn-danger btn-sm" aria-hidden="true">Save</button>
				        <button class="btn btn-success btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
				    </div>
			  	</div><!-- /.modal-content -->
                        						</form>

			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
        <!--Modal-->



  <div class="modal fade" id="newFolder<?php echo $row['id']; ?>">
    <div class="modal-dialog">
                                                						<form method="post" action="get_notes.php">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align: center; font-weight: 700;">New Note</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="folderName">Add a note</label>
                                    <textarea class="form-control" name="notes" rows="3">Add a note about this prospect.</textarea>
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['clientid']; ?>" name="clientid" placeholder="Subject">
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['email']; ?>" name="email" placeholder="Subject">
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['agent_name']; ?>" name="agent_name" placeholder="Subject">
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['prospect_owner']; ?>" name="prospect_owner" placeholder="Subject">
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['status']; ?>" name="status" placeholder="Subject">
                                    <input type="hidden" class="form-control input-sm" value="<?php echo $row['section_name']; ?>" name="section_name" placeholder="Subject">            </div>
        <div class="form-group">
								 <label class="label-checkbox">
								 <input type="checkbox" class="regular-checkbox" name="chk_email" />
								 <span class="custom-checkbox"></span>
									Send e-mail to owner about this note.
								</label>
							</div><!-- /form-group -->
                                    </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-sm" aria-hidden="true">Save</button>
				        <button class="btn btn-success btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
      </div>
      <!-- /.modal-content --> 
</form>

    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
                            
                            	<?php
								 }
								 
								 ?>
								
							</tbody>
						</table>	
						</div><!-- /panel -->
					</div><!-- /.col -->
                    </div>
                    </div>
                    


					<div class="padding-md clearfix">
						
					</div><!-- /.padding-md -->
				</div><!-- /panel -->



	</div>
    <!--Modal-->
  <div class="modal fade" id="no">
    <div class="modal-dialog">
                      <form action="delete_prospect.php?id=<?php echo $row['id']; ?>&s=2" method="post">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 style="text-align:center;">No activity set for this prospect now</h4>
        </div>

        <div class="modal-body">
            <div class="form-group" style="text-align: center;">
              <label for="folderName">Please add first! Thank you</label>
            </div>
        </div>

        <div style="text-align:center;" class="modal-footer">
          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>

          </div>
      </div>
      <!-- /.modal-content --> 
                      </form>

    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
    <!-- /.padding-md --> 
  </div>
  <!-- /main-container --> 
  <!-- Footer
        ================================================== -->
  <!--____________________footer___________________________-->
  <?php include("footer.php"); ?>
  <!--____________________footer___________________________--> 
  
</div>
<!-- /wrapper --> 

<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a> 
<script src="build/jquery.js"></script>
<script src="build/jquery.datetimepicker.full.js"></script>
<?php
$query = mysqli_query($con,"SELECT * FROM pia_leads WHERE FIND_IN_SET('Recall', status) order by date_time desc") ;
				while($row = mysqli_fetch_array($query) ) {
				?>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker<?php echo $row['id']; ?>').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
//startDate:	'1986/01/05'
});
$('#datetimepicker<?php echo $row['id']; ?>').datetimepicker({value:'<?php echo date("Y-m-d H:i:s"); ?>',step:10});


$('#date<?php echo $row['id']; ?>').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
//startDate:	'1986/01/05'
});
//$('#date<?php echo $row['id']; ?>').datetimepicker({value:'<?php echo date("Y-m-d H:i:s"); ?>',step:10});



$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});

$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});
$('#datetimepicker2').datetimepicker({
	yearOffset:222,
	lang:'ch',
	timepicker:false,
	format:'d/m/Y',
	formatDate:'Y/m/d',
	minDate:'-1970/01/02', // yesterday is minimum date
	maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
$('#datetimepicker3').datetimepicker({
	inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
	$('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
	$('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
	$('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
	datepicker:false,
	allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
	step:5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
	if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
		$('#datetimepicker6').datetimepicker('destroy');
		this.value = 'create';
	}else{
		$('#datetimepicker6').datetimepicker();
		this.value = 'destroy';
	}
});
var logic = function( currentDateTime ){
	if (currentDateTime && currentDateTime.getDay() == 6){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
$('#datetimepicker7').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
});
$('#datetimepicker8').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date')
			.toggleClass('xdsoft_disabled');
	},
	minDate:'-1970/01/2',
	maxDate:'+1970/01/2',
	timepicker:false
});
$('#datetimepicker9').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
			.addClass('xdsoft_disabled');
	},
	weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
	timepicker:false
});
var dateToDisable = new Date();
	dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [false, ""]
		}

		return [true, ""];
	}
});
$('#datetimepicker12').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [true, "custom-date-style"];
		}

		return [true, ""];
	}
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})


</script>
<?php
}
?>
<!-- Logout confirmation -->

<!-- Le javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<!-- Jquery -->
	<!-- Datepicker -->
	<script src='js/bootstrap-datepicker.min.js'></script>	

	<!-- Timepicker -->
	<script src='js/bootstrap-timepicker.min.js'></script>
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
			$('#dataTable1').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
				$('#dataTable2').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
			
				$('#dataTable3').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
				$('#dataTable_Recall').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
			$('#dataTable_gap').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
			$('#dataTable_ref').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
			$('#dataTable_client').dataTable( {
				"bJQueryUI": true,
				"sPaginationType": "full_numbers"
			});
			
				$('#dataTable4').dataTable( {
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

















