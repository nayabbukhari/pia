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

<!-- Font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet">

		<link href="css/merge.css" rel="stylesheet">

  <script type="text/javascript">
  function myFunction() {
  //alert("hlo");
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var ok = true;
    if (pass1 != pass2) {
        alert("Passwords Do not match");
        document.getElementById("pass1").style.borderColor = "rgb(52, 208, 227)";
        document.getElementById("pass2").style.borderColor = "#E34234";
        ok = false;
    }
    else {
       // alert("Passwords Match!!!");
    }
    return ok;
}
  
  </script>
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
  <?php include("setting_leftsidebar.php"); ?>
  <!--___________________________.left sidebar________________________-->
  
  <div id="main-container">
    <div id="breadcrumb">
      <ul class="breadcrumb">
        <li><i class="fa fa-home"></i><a href="index.html"> Home</a></li>
        <li ><a href="user_list.php">User management</a></li>
         <li class="active">New User</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
    
    <div class="">
     <div class="panel panel-default">
      <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" onSubmit="return myFunction()"  action="update_user.php" name="client_record" enctype="multipart/form-data" novalidate>
        <div class="panel-heading" style="color: rgb(51, 51, 51); font-size: 22px; font-weight: 700;">User management
</div>
        <div class="col-md-6 col-md-offset-3">
        <?php if(isset($_GET['s'])){

        if($_GET['s'] == '1'){ ?>
          <div class="alert alert-success text-center">
          <h4><strong><i class="fa  fa fa-check-square-o"></i>
successfully create record please add a new.</strong></h4> 
          </div>
       <?php } elseif ($_GET['s'] == '0') { ?>
        <div class="alert alert-success text-center">
          <h4><strong><i class="fa fa-exclamation-circle"></i>
Unsuccessful please try again.</strong></h4> 
 </div>
      <?php } }  ?>


</div>
<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				$query = mysqli_query($con,"select * from pia_login where id='".$_GET['id']."'") ;
                $i = 1;
				while($row = mysqli_fetch_array($query) ) {?> 	
        <div class="panel-body">
          <div class="col-md-8">
          
            						<fieldset class="form-horizontal form-border">
						<div class="form-group">
								<div class="col-lg-12">
                                                <label class="control-label">User photo</label>

									<div class="upload-file">
										<input type="file" id="upload-demo" name="file" class="upload-demo">
										<label data-title="Select file" for="upload-demo">
											<span data-title="No file selected..."></span>
										</label>
									</div>
								</div><!-- /.col -->
							</div><!-- /form-group -->
                            </fieldset>
                            
          <div class="row">
                            <input type="hidden" placeholder="Full name" value="<?php echo $row['id']; ?>" class="form-control input-sm parsley-validated " data-required="true" name="id">
          <input type="hidden" placeholder="Full name" value="<?php echo $row['path']; ?>" class="form-control input-sm parsley-validated " data-required="true" name="path1">

            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">Full Name</label>
                <input type="text" placeholder="Full name" value="<?php echo $row['username']; ?>" class="form-control input-sm parsley-validated " data-required="true" name="user_name">
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6" id="TextBoxesGroup">
              <div class="form-group">
                <label class="control-label">Role</label>
                <select class="form-control input-sm parsley-validated" data-required="true" name="role">
                <?php
				if($row['role']=='AGENTS'){?>
                                  <option value="AGENTS">AGENTS</option>
                  <option value="SUPER ADMINISTRATORS">SUPER ADMINISTRATORS</option>
                  <option value="SUPERVISORS">SUPERVISORS</option>
                 <?php
				 }
				if($row['role']=='SUPERVISORS')
				{
				?>
                
                  <option value="SUPERVISORS">SUPERVISORS</option>
                  <option value="SUPER ADMINISTRATORS">SUPER ADMINISTRATORS</option>
                  <option value="AGENTS">AGENTS</option>
                 <?php
				 }
else
{				 ?>
                  <option value="SUPER ADMINISTRATORS">SUPER ADMINISTRATORS</option>
                  <option value="AGENTS">AGENTS</option>
                  <option value="SUPERVISORS">SUPERVISORS</option>
                  <?php
				  }
				  ?>
                </select>
              </div>
            </div>
          
            
            <!-- /.col -->
         </div>
         
            <div class="row">
            <div class="col-md-6">
            
             <div class="form-group">
                <label class="control-label">Email</label>
                <input type="email" placeholder="Email" class="form-control input-sm parsley-validated " value="<?php echo $row['email']; ?>" data-required="true" name="email">
              </div>
            
             </div>
           <div class="col-md-6" id="TextBoxesGroup">
              <div class="form-group">
                <label class="control-label">Status</label>
                <select class="form-control input-sm parsley-validated" data-required="true" name="status">
                <?php
				if($row['status']=='active')
				{
				?>
                  <option value="active">Active</option>
                  <option value="not">Not Active</option>
                 <?php
				 }
else
				 {
				 ?>                  <option value="not">Not Active</option>

                   <option value="active">Active</option>
                  <?php
				  }
				  ?>
                </select>
              </div>
            </div>
          
            
<!-- /.row -->
      </div>
       </div>
       </div>       
       <?php
	   }
	   
	   ?>   
         <div class="row">
            <div class="col-md-6">
        <div class="panel-footer text-right" style="text-align: left;margin-left: 16px;">
          <button class="btn btn-success" type="submit">SAVE</button>
          <button class="btn btn-success" type="reset">Clear</button>
        </div>
        </div>
        </div>
      </form>
    </div>
    <!-- /panel --> 
  </div>
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

<!-- Parsley --> 
<script src="js/parsley.min.js"></script> 

<!-- Slimscroll --> 
<script src='js/jquery.slimscroll.min.js'></script> 


<!-- Datepicker --> 
<script src='js/bootstrap-datepicker.min.js'></script> 

<!-- Timepicker --> 
<script src='js/bootstrap-timepicker.min.js'></script> 

<!-- Tag input --> 
<script src='js/jquery.tagsinput.min.js'></script> 

<!-- WYSIHTML5 --> 
<script src='js/wysihtml5-0.3.0.min.js'></script> 
<script src='js/uncompressed/bootstrap-wysihtml5.js'></script> 

    
<!-- Chosen -->
<script src='js/chosen.jquery.min.js'></script>	

<!-- Mask-input -->
<script src='js/jquery.maskedinput.min.js'></script>	

<!-- Slider -->
<script src='js/bootstrap-slider.min.js'></script>	


<!-- Dropzone -->
<script src='js/dropzone.min.js'></script>	

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
<script src="js/endless/endless_form.js"></script>
<script src="js/endless/endless.js"></script>


<script type="text/javascript">

$(document).ready(function(){

    var counter = 2;
		
    $("#addButton").click(function () {
				
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}   
		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
                
	newTextBoxDiv.after().html(
	      '<select name="product[]" id="product' + counter + '" class="form-control input-sm"><option value="product1">product 1</option><option value="product2">product 2</option><option value="product3">product 3</option><option value="product4">product 4</option></select> <br />');
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");

				
	counter++;
     });

     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv" + counter).remove();
			
     });
		
  });
</script>


</body>

<!-- Mirrored from minetheme.com/Endless1.5.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:17:34 GMT -->

</html>
