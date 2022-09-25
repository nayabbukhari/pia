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

<style>
.control-label {
    padding-top: 0px !important;
}
#second_box {
    margin-top: 15px;
    border-bottom: #eee solid 1px;
    padding-bottom: 15px;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
 <script>
	$(document).ready(function(){
    $("#ind").click(function(){
        $("#first_box").show();
		 $("#second_box").hide();
    });
    $("#group").click(function(){
 $("#first_box").hide();
		 $("#second_box").show();
		     });
});

	$(document).ready(function(){
    $("#yes").click(function(){
        $("#file").show();
    });
    $("#no").click(function(){
 $("#file").hide();
		 $("#file").hide();
		     });
});



	</script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <SCRIPT language="javascript">
$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
            });        
        }
    });
   
});

$(document).ready(function(){
    $("#selecctall").change(function(){
      $(".checkbox1").prop('checked', $(this).prop("checked"));
      });
});
</SCRIPT>
</head>

<body class="overflow-hidden">
<!-- Overlay Div --> 
<!--___________________________overlay_________________________-->
<?php //include("overlay.php"); ?>
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
        <li class="active">Email Notifications</li>
      </ul>
    </div>
    <!--breadcrumb-->
           
      <!-- /panel -->
      <div class="panel panel-default">
              <div class="panel-heading" style="color: rgb(51, 51, 51); font-size: 22px; font-weight: 700; margin-left: 15px;">Email Notifications</div>

        <div class="panel-body">
          <form id="formToggleLine" class="form-horizontal no-margin form-border" action="get.php">
                       	<div class="form-group">
								<label class="col-lg-2 control-label" style="padding-top: 0px;">Choose One:</label>
								<div class="col-lg-10">
									<label class="label-radio inline">
										<input id="ind" type="radio" name="mail_type">
										<span class="custom-radio"></span>
										Individual 
									</label>
									<label class="label-radio inline">
										<input id="group" type="radio" name="mail_type">
										<span class="custom-radio"></span>
										Group 
									</label>
								</div><!-- /.col -->
							</div><!-- /form-group -->
                            <div class="form-group" id="first_box" style="display:none;">
								<label class="col-lg-2 control-label">Individual mail:</label>
								<div class="col-lg-10">
				<?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				$query = mysqli_query($con,"select * from pia_login order by  date_time desc") ;
                $i = 1;
				while($row = mysqli_fetch_array($query) ) {?> 
                
									<label class="label-radio">
										<input type="radio" name="client" name="individual_mail" value="<?php echo $row['email']; ?>">
										<span class="custom-radio"></span>
<?php echo $row['email']; ?>
									</label>
                                    <?php
									}
									?>
								</div><!-- /.col -->
							</div><!-- /form-group -->
                            <div  id="second_box" style="display:none;">
                              <div class="form-group"  >
								<label class="col-lg-2 control-label">Group mail:</label>
								<div class="col-lg-10">
									<label class="label-checkbox inline">
										<input type="checkbox" id="selecctall">
										<span class="custom-checkbox"></span>
										Select all
									</label>
                                    </div>
                                    </div><!-- /form-group -->
                            <div class="form-group" style="margin-top: -12px;">
                            <label class="col-lg-2 control-label"></label>
								<div class="col-lg-10">
                                <?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				$query = mysqli_query($con,"select * from pia_login order by  date_time desc") ;
                $i = 1;
				while($row = mysqli_fetch_array($query) ) {?> 
                
									<label class="label-checkbox">
										<input class="checkbox1" type="checkbox" value="<?php echo $row['email']; ?>" name="group_mail[]" >
										<span class="custom-checkbox"></span>
<?php echo $row['email']; ?>
									</label>
                                    <?php
									}
									?>
									
								</div><!-- /.col -->
							</div><!-- /form-group -->
                          

                            </div>
                            
<div class="form-group">
              <label class="col-lg-2 control-label">Body:
              </label>
              <div class="col-lg-8">
                <textarea name="wysihtml5-textarea" rows="6" class="form-control" id="wysihtml5-textarea" placeholder="Enter your text ..."></textarea>
              </div>
              <!-- /.col -->
              
            </div>
            
            <div class="form-group">
								<label class="col-lg-2 control-label" style="padding-top: 0px;">Attach files:</label>
								<div class="col-lg-10">
									<label class="label-radio inline">
										<input id="yes" type="radio" name="attched">
										<span class="custom-radio"></span>
										Yes 
									</label>
									<label class="label-radio inline">
										<input id="no" type="radio" checked name="attched">
										<span class="custom-radio"></span>
										No 
									</label>
								</div><!-- /.col -->
							</div><!-- /form-group -->
                            
                             <div class="form-group" id="file" style="display:none;">
								<label class="col-lg-2 control-label">Choose File:</label>
								<div class="col-lg-4">
				<div class="upload-file">
										<input type="file" id="upload-demo" class="upload-demo">
										<label data-title="Select file" for="upload-demo">
											<span data-title="No file selected..."></span>
										</label>
									</div>
								</div><!-- /.col -->
							</div><!-- /form-group -->
                            
            
<div class="form-group">
              <label class="col-lg-2 control-label">
              </label>
              <div class="col-lg-8">
               									<button type="submit" class="btn btn-success btn-sm">SEND</button>
              </div>
              <!-- /.col -->

            </div>
          </form>
        </div>
      </div>
      <!-- /panel --><!-- /panel -->
      <!-- /panel -->
      <!-- /panel -->
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
