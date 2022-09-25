<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from minetheme.com/Endless1.5.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:20:51 GMT -->
<head>
<style>
.error {color: #FF0000;}
</style>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Font Awesome -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	
	<!-- Endless -->
	<link href="css/merge.css" rel="stylesheet">

  </head>

  <body style="background:rgb(54, 54, 54) none repeat scroll 0% 0%;">
	<div class="login-wrapper" style="top:83px;">
		<div class="text-center">
        <img src="img/Probatio-Logos-3b copy.png" width="200px" height="70px">
			<h3 class="fadeInUp animation-delay8" style="font-weight:bold">
				<span class="text-success">Probatio Insurance </span> <span style="color:#ccc; text-shadow:0 1px #fff"> Application</span>
			</h3>
		</div>
		<div class="login-widget animation-delay1">	
			<div class="panel panel-default">
				<div class="panel-heading clearfix">
					<div class="text-center" style="color: #65cea7;">
					<h3><i class="fa fa-lock fa-lg"></i> Login</h3></div>
		        <span class="pull-left"> </span></div>
		        <?php if( isset($_GET['v']) ) { if(($_GET['v'])=='0'){?>
		        <div class="alert text-center">
<i class="fa fa-warning"></i><span class="m-left-xs has-error">Invalid Username Or  Password</span>
</div>
<?php } }?>
				<div class="panel-body">
					<form class="form-login" method="post" action="login.php" enctype="multipart/form-data">
						<div class="form-group">
							<label>Email</label>
							<input type="text" placeholder="Email" class="form-control input-sm bounceIn animation-delay2" name="username" required>
							<?php if( isset($_GET['u']) ) { if(($_GET['u'])=='0'){?>
							<span class="error">* Email Required</span>
							<?php } }?>
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" placeholder="Password" class="form-control input-sm bounceIn animation-delay4" name="password" required>
							<?php if( isset($_GET['p']) ) { if(($_GET['p'])=='0'){?>
							<span class="error">* password Required</span>
							<?php } }?>
						</div>
						<div class="form-group">
							<label class="label-checkbox inline">
								<input type="checkbox" class="regular-checkbox chk-delete" />
								<span class="custom-checkbox info bounceIn animation-delay4"></span>
							</label>
							Remember me		
                         <a href="#" style="float: right;"> <span>  Forgot your password?</span></a>

						</div>
		
					
						<hr/>
						<button class="btn btn-success btn-sm bounceIn animation-delay5  pull-right" type="submit" ><i class="fa fa-sign-in"></i> Sign in</button>
					</form>
				</div>
			</div><!-- /panel -->
		</div><!-- /login-widget -->
	</div><!-- /login-wrapper -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <!-- Jquery -->
	<script src="js/jquery-1.10.2.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
   
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
  </body>

<!-- Mirrored from minetheme.com/Endless1.5.1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 14 Oct 2015 08:20:51 GMT -->
</html>
