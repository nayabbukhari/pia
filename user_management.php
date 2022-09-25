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

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
		<link href="css/merge.css" rel="stylesheet">

  
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
  
  <div id="main-container">
    <div id="breadcrumb">
      <ul class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
        <li class="active">Quotations</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
     <div class="clearfix"></div>
   <div class="padding-md clearfix"> <a class="btn btn-success" style="" href="client_records.php"><i class="fa fa-plus fa-lg"></i>&nbsp;Add user</a></div>
    <div class="clearfix"></div>
<div class="panel panel-default table-responsive">
					<div class="panel-heading">
						User management
					</div>
					<div class="padding-md clearfix">
						<table class="table table-striped" id="dataTable">
							<thead>
								<tr>
									<th>Id</th>
									<th>Email</th>
									<th>Full name</th>
									<th>Phone number</th>
									<th>Emergency contect</th>
									<th>Emergency contect phone number</th>
									<th></th>
								</tr>
							</thead>
							<tbody>

				<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				$query = mysqli_query($con,"select * from pia_client") ;
                $i = 1;
				while($row = mysqli_fetch_array($query) ) {?> 		
								<tr>
                                    <td><?php echo $i ;?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['firstname']."&nbsp;".$row['lastname'] ;?></td>
									<td></td>
									<td></td>
									<td></td>
									<td>
									<a href="control_client_records.php?t=e&i=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>" class="btn btn-xs btn-info" >Edit</a> &nbsp;&nbsp;
									<a href="control_client_records.php?t=d&i=<?php echo$row['id']; ?>&k=<?php echo $_SESSION['key'];?>" class="btn btn-xs btn-danger">Clear</a>
									</td>
								</tr>
								<?php $i++; }?>
								
							</tbody>
						</table>
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


























