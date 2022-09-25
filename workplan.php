<?php
session_start();
$user=$_SESSION['user'];
if(!isset($user))
{
header("location:index.php");
}
include("connection.php");
$query = mysqli_query($con,"select * from pia_login where email='".$user."'") ;
$i = 1;
while($row1 = mysqli_fetch_array($query) ) 
{
$role=$row1['role'];
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

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome-->
	<link href="css/font-awesome.min.css" rel="stylesheet">

	<link href="css/merge.css" rel="stylesheet">

  <style>
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

</style>
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
        <li class="active">WorkPlan</li>
                <li class="active"><?php $page=basename($_SERVER['PHP_SELF']); $pa=explode(".", $page);		// echo $pa[0]; ?></li>

      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
     <div class="clearfix"></div>
    <div class="clearfix"></div>
<div class="panel panel-default table-responsive">
					<div class="panel-heading">
<strong>						WorkPlan
</strong>					</div>
<div class="padding-md">
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							
							<div class="panel-tab clearfix">
								<ul class="tab-bar">
									<li><a href="#home1" data-toggle="tab"><i class="fa fa-home"></i> All</a></li>
									<li  class="active"><a href="#Recall" data-toggle="tab"><i class="fa fa-bell"></i> Recall</a></li>
									<li><a href="#Client" data-toggle="tab"><i class="fa fa-user"></i> Client</a></li>
									<li><a href="#Premium-Gap" data-toggle="tab"><i class="fa fa-dashboard"></i> Premium Gap</a></li>
									<!--<li><a href="#Refused" data-toggle="tab"><i class="fa fa-retweet"></i> Refused</a></li> -->
								</ul>
							</div>
							<div class="panel-body">
								<div class="tab-content">
                                
                                <!--------------------------------------------------------Tab home --------------------------------------->
                                
									<div class="tab-pane fade" id="home1">
                                    <div class="panel-tab clearfix">
								<ul class="tab-bar right">
									<li style="border-right:#B7B7B7 solid 1px;" ><a href="#year" data-toggle="tab"> Quarter</a></li>
									<li ><a href="#month" data-toggle="tab"> Month</a></li>
									<li><a href="#week" data-toggle="tab"> Week</a></li>
									<li><a href="#today" data-toggle="tab"> Today</a></li>
									<li class="active"><a href="#All" data-toggle="tab"> All</a></li>
								</ul>
							</div>
							<div class="panel-body">
								<div class="tab-content">
                                
									<div class="tab-pane fade in active" id="All">
										<table class="table table-striped" id="dataTable">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Product</th>
									<th>Status</th>
									<!-- <th>Date Created</th> -->
									<th>Effective date</th>
									<th>Activity 1</th>
									<th>Activity 2</th>
									<th>Activity 3</th>
									<th>Renewal Date</th>
									<th>Others</th>
									<th>Capitale</th>
									<th>Insurer</th>
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
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							<?php include("connection.php");
                            @session_start();
                            $_SESSION['key'] = md5(mt_rand()); 
							
                            if($role=='AGENTS')
                            {
							 $query = mysqli_query($con,"select * from pia_leads where prospect_owner='".$user."' order by date_time desc") ;
                            }
                            else
                            {
                            $query = mysqli_query($con,"select * from pia_leads order by date_time desc") ;
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
                         ?>
                <tr>
                <td><a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $products; ?></td> 
                <td><?php echo $status;?></td>
               <!--  <td><?php echo $row['date_time']; ?></td> -->
                <td><?php echo $row['effectivedate']; ?></td>
                <td><?php echo $row['activity1']; ?></td>
                <td><?php echo $row['activity2']; ?></td>
                <td><?php echo $row['activity3']; ?></td>
                <td><?php echo $row['renewal_date']; ?></td>
                <td><?php echo $Others;if($Others!=''){?>$<?php }?></td>
                <td><?php echo $Capitale; if($Capitale!=''){?>$<?php }?></td>
                <td><?php echo $insurer; ?></td>
              
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
                <a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
                </tr>
                       
                
								<?php
								 }?>
								
							</tbody>
						</table>
									</div>
                                    
                                
                                    
									<div class="tab-pane fade" id="today">
<table class="table table-striped" id="dataTable1">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Product</th>
									<th>Status</th>
								 <!--	<th>Date Created</th> -->
									<th>Effective date</th>
                                    	<th>Activity 1</th>
									<th>Activity 2</th>
									<th>Activity 3</th>
                                    <th>Renewal Date</th>
									<th>Others</th>
									<th>Capitale</th>
									<th>Insurer</th>
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
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				 if($role=='AGENTS')
                            {
							 $query = mysqli_query($con,"select * from pia_leads where  `date_time` >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) and prospect_owner='".$user."' order by date_time desc") ;
                            }
                            else
                            {
				$query = mysqli_query($con,"select * from pia_leads where  `date_time` >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) order by date_time desc") ;
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
                            
                         ?>
 <tr>
                <td><a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $products; ?></td> 
                <td><?php echo $status;?></td>
               <!--  <td><?php echo $row['date_time']; ?></td> -->
                <td><?php echo $row['effectivedate']; ?></td>
                <td><?php echo $row['activity1']; ?></td>
                <td><?php echo $row['activity2']; ?></td>
                <td><?php echo $row['activity3']; ?></td>
                                <td><?php echo $row['renewal_date']; ?></td>

                <td><?php echo $Others;if($Others!=''){?>$<?php }?></td>
                <td><?php echo $Capitale; if($Capitale!=''){?>$<?php }?></td>
                <td><?php echo $insurer; ?></td>
                
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
                <a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
                </tr>
                           
                
								<?php
								 }?>
								
							</tbody>
						</table>	
                        										</div> 
                                                                
									<div class="tab-pane fade" id="week">
                                    <table class="table table-striped" id="dataTable2">
                                    <thead>
                                    <tr>
                                    <th>Client Id</th>
                                    <th>Product</th>
                                    <th>Status</th>
                                     <!-- <th>Date Created</th> -->
                                    <th>Effective date</th>
                                    	<th>Activity 1</th>
									<th>Activity 2</th>
									<th>Activity 3</th>
                                    									<th>Renewal Date</th>
                                    <th>Others</th>
                                    <th>Capitale</th>
                                    <th>Insurer</th>
                                    
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
                                    <th>&nbsp;</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include("connection.php");
                                    @session_start();
                                    $_SESSION['key'] = md5(mt_rand()); 
													if($role=='AGENTS')
													{
													$query = mysqli_query($con,"select * from pia_leads where  `date_time` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) and prospect_owner='".$user."' order by date_time desc") ;
													}
													else
													{
													$query = mysqli_query($con,"select * from pia_leads where  `date_time` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) order by date_time desc") ;
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
										?>
									 <tr>
                <td><a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $products; ?></td> 
                <td><?php echo $status;?></td>
               <!--  <td><?php echo $row['date_time']; ?></td> -->
                <td><?php echo $row['effectivedate']; ?></td>
                <td><?php echo $row['activity1']; ?></td>
                <td><?php echo $row['activity2']; ?></td>
                <td><?php echo $row['activity3']; ?></td>
                                <td><?php echo $row['renewal_date']; ?></td>

                <td><?php echo $Others;if($Others!=''){?>$<?php }?></td>
                <td><?php echo $Capitale; if($Capitale!=''){?>$<?php }?></td>
                <td><?php echo $insurer; ?></td>
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
                <a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
                </tr>
                       
                                    
                                    <?php
                                    }?>
                                    
                                    </tbody>
                                    </table>	
                        												</div>
									<div class="tab-pane fade" id="month">
<table class="table table-striped" id="dataTable3">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Product</th>
									<th>Status</th>
								 <!--	<th>Date Created</th> -->
									<th>Effective date</th>
                                    	<th>Activity 1</th>
									<th>Activity 2</th>
									<th>Activity 3</th>
                                    									<th>Renewal Date</th>

									<th>Others</th>
									<th>Capitale</th>
									<th>Insurer</th>
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

									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				 if($role=='AGENTS')
                            {
							 $query = mysqli_query($con,"select * from pia_leads where  `date_time` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) and prospect_owner='".$user."' order by date_time desc") ;
                            }
                            else
                            {
				$query = mysqli_query($con,"select * from pia_leads where  `date_time` >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH) order by date_time desc") ;
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
										?>
									 <tr>
                <td><a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $products; ?></td> 
                <td><?php echo $status;?></td>
               <!--  <td><?php echo $row['date_time']; ?></td> -->
                <td><?php echo $row['effectivedate']; ?></td>
                <td><?php echo $row['activity1']; ?></td>
                <td><?php echo $row['activity2']; ?></td>
                <td><?php echo $row['activity3']; ?></td>
                                <td><?php echo $row['renewal_date']; ?></td>

                <td><?php echo $Others;if($Others!=''){?>$<?php }?></td>
                <td><?php echo $Capitale; if($Capitale!=''){?>$<?php }?></td>
                <td><?php echo $insurer; ?></td>
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
                <a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
                </tr>
                       
								<?php
								 }?>
								
							</tbody>
						</table>	
                        												</div>
                                    
                                    
                                    <div class="tab-pane fade" id="year">
<table class="table table-striped" id="dataTable4">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Product</th>
									<th>Status</th>
								 <!--	<th>Date Created</th> -->
									<th>Effective date</th>
                                    	<th>Activity 1</th>
									<th>Activity 2</th>
									<th>Activity 3</th>		
                           							<th>Renewal Date</th>

									<th>Others</th>
									<th>Capitale</th>
									<th>Insurer</th>
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
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				 if($role=='AGENTS')
                            {
							 $query = mysqli_query($con,"select * from  pia_leads where date(renewal_date) >= date(adddate(now(),30 )) and date(renewal_date) <= date(adddate(now(),60 )) and status in ('Premium Gap','Client') and prospect_owner='".$user."' order by date_time desc") ;
                            }
                            else
                            {
				$query = mysqli_query($con,"select * from  pia_leads where date(renewal_date) >= date(adddate(now(),30 )) and date(renewal_date) <= date(adddate(now(),60 )) and status in ('Premium Gap','Client') order by date_time desc") ;
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
										?>
										
										 <tr>
                <td><a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $products; ?></td> 
                <td><?php echo $status;?></td>
               <!--  <td><?php echo $row['date_time']; ?></td> -->
                <td><?php echo $row['effectivedate']; ?></td>
                <td><?php echo $row['activity1']; ?></td>
                <td><?php echo $row['activity2']; ?></td>
                <td><?php echo $row['activity3']; ?></td>
                                <td><?php echo $row['renewal_date']; ?></td>

                <td><?php echo $Others;if($Others!=''){?>$<?php }?></td>
                <td><?php echo $Capitale; if($Capitale!=''){?>$<?php }?></td>
                <td><?php echo $insurer; ?></td>
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
                <a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
                </tr>
                       
								<?php
								 }?>
								
							</tbody>
						</table>										</div>
                                    
								</div>
							</div>
										
									</div>
                                    
                                      <!--------------------------------------------------------Tab home --------------------------------------->
                           
                                <!--------------------------------------------------------Tab Recall --------------------------------------->

									<div class="tab-pane fade  in active" id="Recall">
                                    
<table class="table table-striped" id="dataTable_Recall">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Product</th>
									<th>Status</th>
									 <!--<th>Date Created</th>-->
									<th>Effective date</th>
                                    	<th>Activity 1</th>
									<th>Activity 2</th>
									<th>Activity 3</th>
                                    									<th>Renewal Date</th>

									<th>Others</th>
									<th>Capitale</th>
									<th>Insurer</th>
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
									<th>&nbsp;</th>
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
										?>
										 <tr>
                <td><a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $products; ?></td> 
                <td><?php echo $status;?></td>
               <!--  <td><?php echo $row['date_time']; ?></td> -->
                <td><?php echo $row['effectivedate']; ?></td>
                <td><?php echo $row['activity1']; ?></td>
                <td><?php echo $row['activity2']; ?></td>
                <td><?php echo $row['activity3']; ?></td>
                                <td><?php echo $row['renewal_date']; ?></td>

                <td><?php echo $Others;if($Others!=''){?>$<?php }?></td>
                <td><?php echo $Capitale; if($Capitale!=''){?>$<?php }?></td>
                <td><?php echo $insurer; ?></td>
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
                <a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
                </tr>
                       
								<?php
								 }?>
								
							</tbody>
						</table>	
                        					</div>
                                    
                                
                                  
                                    
                                    
                                      
                                <!--------------------------------------------------------Tab Recall --------------------------------------->

  
                                <!--------------------------------------------------------Tab Client --------------------------------------->

                                    
									<div class="tab-pane fade" id="Client">
<table class="table table-striped" id="dataTable_client">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Product</th>
									<th>Status</th>
									 <!--<th>Date Created</th> -->
									<th>Effective date</th>
                                    	<th>Activity 1</th>
									<th>Activity 2</th>
									<th>Activity 3</th>
                                    									<th>Renewal Date</th>

									<th>Others</th>
									<th>Capitale</th>
									<th>Insurer</th>
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
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				 if($role=='AGENTS')
                            {
							 $query = mysqli_query($con,"SELECT * FROM pia_leads WHERE FIND_IN_SET('Client', status) and prospect_owner='".$user."' order by date_time desc") ;
                            }
                            else
                            {
				$query = mysqli_query($con,"SELECT * FROM pia_leads WHERE FIND_IN_SET('Client', status) order by date_time desc") ;
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
										?>
									 <tr>
                <td><a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $products; ?></td> 
                <td><?php echo $status;?></td>
               <!--  <td><?php echo $row['date_time']; ?></td> -->
                <td><?php echo $row['effectivedate']; ?></td>
                <td><?php echo $row['activity1']; ?></td>
                <td><?php echo $row['activity2']; ?></td>
                <td><?php echo $row['activity3']; ?></td>
                                <td><?php echo $row['renewal_date']; ?></td>

                <td><?php echo $Others;if($Others!=''){?>$<?php }?></td>
                <td><?php echo $Capitale; if($Capitale!=''){?>$<?php }?></td>
                <td><?php echo $insurer; ?></td>
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
                <a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
                </tr>
                       
                
								<?php
								 }?>
								
							</tbody>
						</table>										</div>
                                    
                                    
                           <!--------------------------------------------------------Tab Client --------------------------------------->
                           
                                <!--------------------------------------------------------Tab Premium-Gap --------------------------------------->

                                    
                                    <div class="tab-pane fade" id="Premium-Gap">
<table class="table table-striped" id="dataTable_gap">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Product</th>
									<th>Status</th>
									 <!--<th>Date Created</th>-->
									<th>Effective date</th>
                                    	<th>Activity 1</th>
									<th>Activity 2</th>
									<th>Activity 3</th>
                                    									<th>Renewal Date</th>

									<th>Others</th>
									<th>Capitale</th>
                                        <th>Insurer</th>
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
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				 if($role=='AGENTS')
                            {
							 $query = mysqli_query($con,"SELECT * FROM pia_leads WHERE FIND_IN_SET('Premium Gap', status) and prospect_owner='".$user."' order by date_time desc") ;
                            }
                            else
                            {
				$query = mysqli_query($con,"SELECT * FROM pia_leads WHERE FIND_IN_SET('Premium Gap', status) order by date_time desc") ;
			
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
										?>
									 <tr>
                <td><a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $products; ?></td> 
                <td><?php echo $status;?></td>
               <!--  <td><?php echo $row['date_time']; ?></td> -->
                <td><?php echo $row['effectivedate']; ?></td>
                <td><?php echo $row['activity1']; ?></td>
                <td><?php echo $row['activity2']; ?></td>
                <td><?php echo $row['activity3']; ?></td>
                                <td><?php echo $row['renewal_date']; ?></td>

                <td><?php echo $Others;if($Others!=''){?>$<?php }?></td>
                <td><?php echo $Capitale; if($Capitale!=''){?>$<?php }?></td>
                <td><?php echo $insurer; ?></td>
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
                <a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
                </tr>
                       
                
								<?php
								 }?>
								
							</tbody>
						</table>									</div>
                                    
                                    
                                <!--------------------------------------------------------Tab Premium-Gap --------------------------------------->
                                
                  <!--------------------------------------------------------Tab Refused --------------------------------------->


                                    <div class="tab-pane fade" id="Refused">
<table class="table table-striped" id="dataTable_ref">
							<thead>
								<tr>
									<th>Client Id</th>
									<th>Product</th>
									<th>Status</th>
								 <!--	<th>Date Created</th>-->
									<th>Effective date</th>
                                    	<th>Activity 1</th>
									<th>Activity 2</th>
									<th>Activity 3</th>
                                    									<th>Renewal Date</th>

									<th>Others</th>
									<th>Capitale</th>
									<th>Insurer</th>
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
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				$query = mysqli_query($con,"SELECT * FROM pia_leads WHERE FIND_IN_SET('Refused', status) order by date_time desc") ;
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
										?>
									 <tr>
                <td><a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" title="Edit"><strong><?php echo $row['clientid']; ?></strong></a></td>
             <td><?php echo $products; ?></td> 
                <td><?php echo $status;?></td>
               <!--  <td><?php echo $row['date_time']; ?></td> -->
                <td><?php echo $row['effectivedate']; ?></td>
                <td><?php echo $row['activity1']; ?></td>
                <td><?php echo $row['activity2']; ?></td>
                <td><?php echo $row['activity3']; ?></td>
                                <td><?php echo $row['renewal_date']; ?></td>

                <td><?php echo $Others;if($Others!=''){?>$<?php }?></td>
                <td><?php echo $Capitale; if($Capitale!=''){?>$<?php }?></td>
                <td><?php echo $insurer; ?></td>
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
                <a href="edit_prospect.php?t=e&id=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>&for=<?php echo $pa[0]; ?>" data-toggle="modal" class="btn btn-sm btn-success check">Edit</a>                </td>
                </tr>
                       
                
								<?php
								 }?>
								
							</tbody>
						</table>									</div>
                                    
                                              <!--------------------------------------------------------Tab Refused --------------------------------------->
        
								</div>
							</div>
						</div><!-- /panel -->
					</div><!-- /.col -->
                    </div>
                    </div>
                    


					<div class="padding-md clearfix">
						
					</div><!-- /.padding-md -->
				</div><!-- /panel -->



	</div>i
    <!-- /.padding-md --> 
  </div>
  <!-- /main-container --> 
  <!-- Footer
        ================================================== -->
  <!--____________________footer___________________________-->
  <?php include("footer.php"); ?>
  <!--____________________footer___________________________--> 
  <!--Modal-->
  <div class="modal fade" id="newFolder">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Create new folder</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="folderName">Folder Name</label>
              <input type="text" class="form-control input-sm" id="folderName" placeholder="Folder name here...">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-sm btn-success" data-dismiss="modal" aria-hidden="true">Close</button>
          <a href="#" class="btn btn-danger btn-sm">Save changes</a> </div>
      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
  <!-- /.modal --> 
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
	<!-----------------------------------------------------------datepicker--------------------------------------------------------->
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
    	<!-----------------------------------------------------------datepicker--------------------------------------------------------->

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

















