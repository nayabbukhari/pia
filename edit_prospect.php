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

<!-- MY css -->

<!-- Bootstrap core CSS -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/merge.css" rel="stylesheet">

<style>
.col-md-6 {
    border-right: #D4D4D4 solid 1px
	}
	.panel-heading
	{
	color: rgb(255, 255, 255) !important;
font-size: 18px;
font-weight: 700;
text-align: center;
background: rgb(26, 51, 71) none repeat scroll 0% 0% !important;
margin-left: -1px;
margin-right: -1px;
height: 47px;
border-radius: 0px;
	}
	.panel-heading span {
    float: right;
    
}
.panel-heading a {
    color: rgb(255, 255, 255) !important;
    font-size: 15px;
}
.panel-heading a:hover {
    float: right;
    color: rgb(74, 160, 207) !important;
    font-size: 15px;
}
#button {
    padding-right: 35px;
    border-radius: 0px;
margin-top: -7px;
    padding-left: 35px;
    background: #38a2c9;
    border: #38a2c9 solid;
	font-weight: 700;

margin-right: 10px;}
    </style>
</head>
<script>
function myFunction() {

    var inputVal = document.getElementById("client_id");
    var button = document.getElementById("button");
 if (inputVal.value == "") {
        button.style.backgroundColor = "#38a2c9";
        button.style.border = "3px solid #38a2c9"; 

    }
    else{
        button.style.backgroundColor = "#3ec291";
       button.style.border = "3px solid #3ec291"; 

    }

   /* alert("You pressed a key inside the input field");
    var x = document.forms["client_record"]["client_id"].value;
    if (x == null || x == "") {
       // alert("Name must be filled out");
		   document.getElementById("button").style.background = "#38a2c9";

        return false;
    }
   document.getElementById("button").style.background = "#3ec291";
   document.getElementById("button").style.border = "1px solid #3ec291"; */
}
</script>
<style>
.tab-bar > li {
    display: inline-block;
    float: left;
    margin-bottom: -1px;
    border: 1px solid rgb(191, 191, 191);
    margin-right: 8px;
    border-bottom: none;
	border-radius: 2px;

}
.tab-bar > li a {
color: #EDEDED !important;
font-size: 15px;
font-weight: 700;
padding-left: 13px;
padding-right: 13px;
background: #274359;
}

.tab-bar > li.active a {
    background: #fff;
    color: #777 !important;
}
.tab-bar > li.active a {
    background: #38a2c9 !important;
    color: #FFF !important;
}
.upload-file label
{
background: #38a2c9;
    cursor: pointer !important;
}
.upload-file label span {
color: #fff !important;
}
@media only screen and (min-width: 1100px) {
#newpost {
    display: block;
    padding-left: 0px;
    margin-left: -91px;
    width: 49%;
}
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
        <li><i class="fa fa-home"></i> <a href="dashboard.php"> HOME</a></li>
        <li><img style="width: 20px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; border-radius: 50%;" src="icons/Prospects 3.png"  /> <a href="leads.php"> Prospects</a></li>
        <li class="active">Edit Prospects</li>
      </ul>
    </div>
    <!-- /breadcrumb--><!-- /main-header --><!-- /grey-container -->
    
    <div class="">
     <div class="panel panel-default">
     <?php include("connection.php");
				@session_start();
				$_SESSION['key'] = md5(mt_rand()); 
				$query = mysqli_query($con,"select * from pia_leads where id='".$_GET['id']."' order by date_time desc") ;
                $i = 1;
				while($row = mysqli_fetch_array($query) ) {
				$phone= $row['phone'];
				 $a1=explode(",", $phone);
				$ph=$a1[0];
				
				?> 		
      <form class="no-margin" id="formValidate2" data-validate="parsley" method="post" action="update_prospects.php" name="client_record" enctype="multipart/form-data" novalidate>
        <div class="panel-heading"><img style="width: 44px; margin-top: -10px; margin-bottom: -10px;"  src="icons/Prospects 1.png" /> EDIT PROSPECTS        
<span>  <button class="btn btn-success" id="button" type="submit"><i class="fa fa-check fa-lg"></i>   SAVE</button><a href="leads.php">Cancel</a></span></div>
        <div class="col-md-6 col-md-offset-3">
        <?php /* echo date("Y-m-d H:i:s", strtotime("+1 years", strtotime('2013-05-22 10:35:10'))); */  if(isset($_GET['s'])){

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
        <div class="panel-body">
          <div class="col-md-6">
          
           <div class="row">
            <div class="col-md-12" id="right_border">
              <div class="form-group">
                <label class="control-label">Client ID</label>
                <input type="text" value="<?php echo $row['clientid']; ?>" readonly  id="client_id" onKeyPress="myFunction()" placeholder="Client ID" class="form-control input-sm parsley-validated" data-required="true" name="clientid">
                                <input type="hidden" value="<?php echo $row['id']; ?>" readonly id="client_id" onKeyPress="myFunction()" placeholder="Client ID" class="form-control input-sm parsley-validated" data-required="true" name="id">
                                 <input type="hidden" value="<?php echo $_GET['for']; ?>" readonly id="client_id" onKeyPress="myFunction()" placeholder="Client ID" class="form-control input-sm parsley-validated" data-required="true" name="page">
                                 
                <input value="<?php echo $row['clientid']; ?>" type="hidden" placeholder="Client Email" class="form-control input-sm parsley-validated " data-required="true" name="client_main">

              </div>
            </div>
            <!-- /.col -->
            
          
          </div>
          <!-- row-->
          
            <div class="row">
            <div class="col-md-12" id="right_border">
              <div class="form-group">
                <label class="control-label">Referral ID</label>
                <input type="text" value="<?php echo $row['referral_id']; ?>" readonly  placeholder="Referral ID" class="form-control input-sm parsley-validated"  name="referal_id">
                                <input type="hidden" value="<?php echo $row['id']; ?>" readonly id="client_id" onKeyPress="myFunction()" placeholder="Referral ID" class="form-control input-sm parsley-validated" data-required="true" name="id">

              </div>
            </div>
            <!-- /.col -->
            
          
          </div>
          <!-- row-->
          
          
           <div class="row">
            <div class="col-md-12" id="right_border">
              <div class="form-group">
                <label class="control-label">First name</label>
                <input type="text" placeholder="First name" value="<?php echo $row['firstname']; ?>" class="form-control input-sm parsley-validated" data-required="true" name="firstname">
              </div>
            </div>
            <!-- /.col -->
            
           
          </div>
          
          
          
          <div class="row">
            <div class="col-md-12" id="right_border">
              <div class="form-group">
                <label class="control-label">Last name</label>
                <input value="<?php echo $row['lastname']; ?>" type="text" placeholder="Last name" class="form-control input-sm parsley-validated " data-required="true" name="lastname">
              </div>
            </div>
            <!-- /.col -->
          
          </div>
          
          <div class="row">
            
            <div class="col-md-12" id="right_border">
              <div class="form-group">
                  <label class="control-label">Email</label>
                <input value="<?php echo $row['email']; ?>" type="email" placeholder="Client Email" class="form-control input-sm parsley-validated " data-required="true" name="email">
              </div>
            </div>
            <!-- /.col -->
         
         </div>
         
            <div class="row">
            <div class="col-md-12" id="right_border">
            <div class="form-group">
                    <label class="control-label">Phone</label><br/>
                <div  style="display:inline-flex; width:100%">
                <input value="<?php echo $ph; ?>" type="text" placeholder="Phone" class="form-control input-sm parsley-validated " data-required="true" name="phone">
                 <select style="width: 35%;" class="form-control input-sm parsley-validated " data-required="true" name="phone_1">
                <option value="Work">Work</option>
                <option value="Home">Home</option>
                <option value="Cell">Cell</option>
              </select>
               <select style="padding: 0px;width: 35%;" class="form-control input-sm parsley-validated "  name="phone_2">
                <option value="">When</option>
                <option value="Morning">Morning</option>
                <option value="Day">Day</option>
                <option value="Evening">Evening</option>
              </select>
              </div>
            </div>
            
             </div>
            <!-- /.col -->
            
<!-- /.row -->
      </div>
            
         
         
            
         <script type="text/javascript">  
    //This is done to make the following JavaScript code compatible to XHTML. <![CDATA[ 
  
	function auto() 
    { 
	
	//alert('This is the 2 button.')
	document.getElementById("myText").value = "auto";
	document.getElementById("qustion").value = "auto";
    document.getElementById("btn2").click(); 
    } 
	function auto1() 
    { 
	document.getElementById("myText").value = "auto";
	document.getElementById("qustion").value = "auto";
//	alert('This is the first button.')
    document.getElementById("btn1").click(); 
    } 
	function home() 
    { 
	document.getElementById("myText").value = "home";
	document.getElementById("qustion").value = "home";
	//alert('This is the 2 button.')
    document.getElementById("btn_home1").click(); 
    } 
	function home1() 
    { 
	document.getElementById("myText").value = "home";
	document.getElementById("qustion").value = "home";
//	alert('This is the first button.')
    document.getElementById("btn_home").click(); 
    } 
	
	function note() 
    { 
	document.getElementById("myText").value = "note";
	document.getElementById("qustion").value = "note";
	//alert('This is the 2 button.')
    document.getElementById("btn_note1").click(); 
    } 
	function note1() 
    { 
	document.getElementById("myText").value = "note";
	document.getElementById("qustion").value = "note";
//	alert('This is the first button.')
    document.getElementById("btn_note").click(); 
    } 
	
	
    //]]>  
    </script>    
            <!--------------------------------------------------validation javascript   ------------------------------------------------------>
       <script type="text/javascript">
function calculate(t){
								
								var rege = /^[0-9]*$/;
								if ( rege.test(t.tons.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								tons.value='';
								}
								
								if ( rege.test(t.tons1.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								tons1.value='';
								}
								
								
								if ( rege.test(t.comp.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								comp.value='';
								}
								
								if ( rege.test(t.cap.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								cap.value='';
								}
								if ( rege.test(t.comp1.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								comp1.value='';
								}
								
								if ( rege.test(t.cap1.value) ) {
								
								}
								else
								{
								alert("Please input only numbers");
								cap1.value='';
								}
								
            }
			</script>   
         
         
<div class="row">
<input type="hidden" name="main" value="<?php echo $row['section_name']; ?>" id="myText">
<input type="hidden" name="main1" value="<?php echo $row['section_name']; ?>" id="qustion">
          <div class="col-md-12"> 
          <div class="panel-tab clearfix">
								<ul class="tab-bar">
                                
									<li class="active"><a href="#Auto" onclick='auto()' id="btn1" data-toggle="tab"> <img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="icons/New Icons/Car.png"  /> Auto</a></li>
                                   
									<li><a href="#Home" data-toggle="tab" onclick='home()' id="btn_home"><i style="font-size: 19px;" class="fa fa-home"></i> Home</a></li>
                                    
                                   
									<li><a href="#Enterprise" data-toggle="tab" onclick='note()' id="btn_note"><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="icons/New Icons/Enterprise.png"  /> Enterprise</a></li>
                                    
                                   
								</ul>
							</div>
							<div class="panel-body" style="border: 1px solid rgb(191, 191, 191);">
								<div class="tab-content">
                                 
									<div class="tab-pane fade in active" id="Auto">

                                   			<?php
				$query = mysqli_query($con,"select * from pia_leads where clientid='".$row['clientid']."' and section_name='auto' order by date_time desc") ;
                $i = 1;
				while($row1 = mysqli_fetch_array($query) ) {
				
				$effectivedate= $row1['effectivedate']; 
				$effectivedate = str_replace('-', '/', $effectivedate);
				$effectivedate = date('d/m/Y', strtotime($effectivedate)); 
				//echo $effectivedate;
				$Questions= $row1['Questions']; 
				// echo $Questions;
				$check1 = explode(',',$Questions);
				
				
				$products=$row1['products'];
				
				
				$insurer=$row1['insurer'];
				
				$Others=$row1['Others'];
				
				$Capitale=$row1['Capitale'];
				
				$status=$row1['status'];				
				
				
				}
				
				?>							
                                         <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                   <label class="control-label">Product</label>
                <select class="form-control input-sm parsley-validated"  name="product_auto">
                  <option value="<?php echo $products; ?>"><?php echo $products; ?></option>
                  <option value="VT">VT</option>
                  <option value="Moto">Moto</option>
                  <option value="VTT">VTT</option>
                  <option value="VR">VR</option>
                  <option value="Skidoo">Skidoo</option>
                </select>
               
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
                  <label class="control-label">Comp</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                <input type="text" placeholder="Comp" id="tons" onKeyUp="calculate(this.form)"  class="form-control input-sm parsley-validated " value="<?php echo $Others; ?>"  name="Others_auto">
                </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          <!-- row-->
          
          
           <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                 <label class="control-label">Effective date</label>
              <div class="input-group">
			  <input type="text"class="datepicker form-control input-sm parsley-validated"  value="<?php echo $effectivedate; ?>"  placeholder="DD / MM / YYYY" name="effectivedate_auto">
			  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			  </div>      
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
              <label class="control-label">Capitale</label>
                <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                <input type="text" placeholder="Capitale" id="tons1" onKeyUp="calculate(this.form)"  value="<?php echo $Capitale; ?>"  class="form-control input-sm parsley-validated " name="Capitale_auto">
                </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          
          
          
          <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
               
                       <label class="control-label">Status</label>
                                       <input type="hidden" placeholder="Capitale" id="tons1" onKeyUp="calculate(this.form)"  value="<?php echo $status; ?>"  class="form-control input-sm parsley-validated " name="status_back_auto">

              <select class="form-control input-sm parsley-validated "  name="status_auto">
                                <option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                <option value="Recall">Recall</option>
                <option value="Premium Gap">Premium Gap</option>
                <option value="Refused">Refused</option>
                <option value="Client">Client</option>
              </select>
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
               <label class="control-label">Insurer field</label>
                  <select class="form-control input-sm parsley-validated"  name="insurer_auto">
                                    <option value="<?php echo $insurer; ?>"><?php echo $insurer; ?></option>

				 <option value="Groupe_Promutuel">Groupe Promutuel</option>
				   <option value="Alpha">Alpha</option>
				   <option value="Co-operators">Co-operators</option>
				   <option value="Desjardins">Desjardins</option>
				   <option value="Banque-TD-(Meloche-Monnex)">Banque TD (Meloche-Monnex)</option>
                   <option value="Banque_RBC">Banque RBC</option>
				   <option value="Intact">Intact</option>
				   <option value="Assurnat-(BNC)">Assurnat (BNC)</option>
				   <option value="Belairdirect">Belairdirect</option>
				   <option value="Industrielle-Alliance">Industrielle-Alliance</option>
				   <option value="La-Capitale">La Capitale</option>
				   <option value="La-Personnelle">La Personnelle</option>
				   <option value="Pafco">Pafco</option>
				   <option value="RSA-(Union Canadienne)">RSA (Union Canadienne)</option>
				   <option value="SSQ">SSQ</option>
				   <option value="Unique">Unique</option>
				   <option value="Wanessa">Wanessa</option>
				</select>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          
         
                                        
									</div>
                                   
                                   
									<div class="tab-pane fade" id="Home">
                                   
										
                                    
									
                                    <?php
				$query = mysqli_query($con,"select * from pia_leads where clientid='".$row['clientid']."' and section_name='home' order by date_time desc") ;
                $i = 1;
				while($row2 = mysqli_fetch_array($query) ) {
				
				$effectivedate_home= $row2['effectivedate']; 
				$effectivedate_home = str_replace('-', '/', $effectivedate_home);
				$effectivedate_home = date('d/m/Y', strtotime($effectivedate_home)); 
				//echo $effectivedate;
				$Questions_home= $row2['Questions']; 
				// echo $Questions;
				$check1_home = explode(',',$Questions_home);
				
				
				$products_home=$row2['products'];
			//	echo $products_home;
				
				
				$insurer_home=$row2['insurer'];
				
				$Others_home=$row2['Others'];
				
				$Capitale_home=$row2['Capitale'];
				
				$status_home=$row2['status'];				
				
				}
				
				?>		
                                         <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                   <label class="control-label">Product</label>
                <select class="form-control input-sm parsley-validated"  name="product_home">
                                  <option value="<?php echo $products_home; ?>"><?php echo $products_home; ?></option>
                  <option value="PO">PO</option>
                  <option value="CO">CO</option>
                  <option value="LO">LO</option>
                  <option value="PNO">PNO</option>
                  <option value="RS">RS</option>
                </select>
               
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
                  <label class="control-label">Comp</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                <input type="text" placeholder="Comp" id="comp" onKeyUp="calculate(this.form)" class="form-control input-sm parsley-validated " value="<?php echo $Others_home; ?>"  name="Others_home">
                </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          <!-- row-->
          
          
           <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                 <label class="control-label">Effective date</label>
              <div class="input-group">
			  <input type="text" value="<?php echo $effectivedate_home; ?>" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate_home">
			  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			  </div>      
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
              <label class="control-label">Capitale</label>
                <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                <input type="text" placeholder="Capitale"  id="cap" onKeyUp="calculate(this.form)"  value="<?php echo $Capitale_home; ?>" class="form-control input-sm parsley-validated "  name="Capitale_home">
                </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          
          
          
          <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
               
                       <label class="control-label">Status</label>
                         <input type="hidden" placeholder="Capitale" id="tons1" onKeyUp="calculate(this.form)"  value="<?php echo $status_home; ?>"  class="form-control input-sm parsley-validated " name="status_back_home">
              <select class="form-control input-sm parsley-validated " name="status_home">
                                <option value="<?php echo $status_home; ?>"><?php echo $status_home; ?></option>

                <option value="Recall">Recall</option>
                <option value="Premium Gap">Premium Gap</option>
                <option value="Refused">Refused</option>
                <option value="Client">Client</option>
              </select>
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
               <label class="control-label">Insurer field</label>
                  <select class="form-control input-sm parsley-validated" name="insurer_home">
                                    <option value="<?php echo $insurer_home; ?>"><?php echo $insurer_home; ?></option>

				   <option value="Groupe_Promutuel">Groupe Promutuel</option>
				   <option value="Alpha">Alpha</option>
				   <option value="Co-operators">Co-operators</option>
				   <option value="Desjardins">Desjardins</option>
				   <option value="Banque-TD-(Meloche-Monnex)">Banque TD (Meloche-Monnex)</option>
                   <option value="Banque_RBC">Banque RBC</option>
				   <option value="Intact">Intact</option>
				   <option value="Assurnat-(BNC)">Assurnat (BNC)</option>
				   <option value="Belairdirect">Belairdirect</option>
				   <option value="Industrielle-Alliance">Industrielle-Alliance</option>
				   <option value="La-Capitale">La Capitale</option>
				   <option value="La-Personnelle">La Personnelle</option>
				   <option value="Pafco">Pafco</option>
				   <option value="RSA-(Union Canadienne)">RSA (Union Canadienne)</option>
				   <option value="SSQ">SSQ</option>
				   <option value="Unique">Unique</option>
				   <option value="Wanessa">Wanessa</option>

				</select>
              </div>
            </div>
            <!-- /.col --> 
          </div>
       
                                    
                                    
									</div>
                                  
									<div class="tab-pane fade" id="Enterprise">
                                      	
                                    <?php
				$query = mysqli_query($con,"select * from pia_leads where clientid='".$row['clientid']."' and section_name='enter' order by date_time desc") ;
                $i = 1;
				while($row3 = mysqli_fetch_array($query) ) {
				
				$effectivedate_enter= $row3['effectivedate']; 
				$effectivedate_enter = str_replace('-', '/', $effectivedate_enter);
				$effectivedate_enter = date('d/m/Y', strtotime($effectivedate_enter)); 
				//echo $effectivedate;
				$Questions_enter= $row3['Questions']; 
				// echo $Questions;
				$check1_enter = explode(',',$Questions_enter);
				
				
				$products_enter=$row3['products'];
			//	echo $products_home;
				
				
				$insurer_enter=$row3['insurer'];
				
				$Others_enter=$row3['Others'];
				
				$Capitale_enter=$row3['Capitale'];
				
				$status_enter=$row3['status'];				
				
				}
				
				?>		
                                        
                                         <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                   <label class="control-label">Product</label>
                <select class="form-control input-sm parsley-validated"  name="product_enter">
                                  <option value="<?php echo $products_enter; ?>"><?php echo $products_enter; ?></option>

                  <option value="CC">CC</option>
                  <option value="MB">MB</option>
                  <option value="MC">MC</option>
                  <option value="MCO">MCO</option>
                  <option value="MD">MD</option>
                  <option value="MCM">MCM</option>
                  <option value="MGA">MGA</option>
                  <option value="MG">MG</option>
                  <option value="MPF">MPF</option>
                  <option value="FPQ4">FPQ4</option>
                  <option value="RCOM">RCOM</option>
                  <option value="VCOM">VCOM</option>
                </select>
               
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
                  <label class="control-label">Comp</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                <input type="text" placeholder="Comp"  id="comp1" onKeyUp="calculate(this.form)" class="form-control input-sm parsley-validated " value="<?php echo $Others_enter; ?>"  name="Others_enter">
                </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          <!-- row-->
          
          
           <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
                 <label class="control-label">Effective date</label>
              <div class="input-group">
			  <input type="text"  value="<?php echo $effectivedate_enter; ?>" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate_enter">
			  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			  </div>      
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
              <label class="control-label">Capitale</label>
                <div class="input-group">
                        <span class="input-group-addon">$</span>
                        
                <input type="text" placeholder="Capitale"  id="cap1" onKeyUp="calculate(this.form)"  value="<?php echo $Capitale_enter; ?>" class="form-control input-sm parsley-validated "  name="Capitale_enter">
                </div>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          
          
          
          <div class="row">
            <div class="col-md-6" id="right_border">
              <div class="form-group">
               
                       <label class="control-label">Status</label>
                         <input type="hidden" placeholder="Capitale" id="tons1" onKeyUp="calculate(this.form)"  value="<?php echo $status_enter; ?>"  class="form-control input-sm parsley-validated " name="status_back_enter">
              <select class="form-control input-sm parsley-validated "  name="status_enter">
                                <option value="<?php echo $status_enter; ?>"><?php echo $status_enter; ?></option>

                <option value="Recall">Recall</option>
                <option value="Premium Gap">Premium Gap</option>
                <option value="Refused">Refused</option>
                <option value="Client">Client</option>
              </select>
              </div>
            </div>
            <!-- /.col -->
            
            <div class="col-md-6">
              <div class="form-group">
               <label class="control-label">Insurer field</label>
                  <select class="form-control input-sm parsley-validated" name="insurer_enter">
                                    <option value="<?php echo $insurer_enter; ?>"><?php echo $insurer_enter; ?></option>

				  <option value="Groupe_Promutuel">Groupe Promutuel</option>
				   <option value="Alpha">Alpha</option>
				   <option value="Co-operators">Co-operators</option>
				   <option value="Desjardins">Desjardins</option>
				   <option value="Banque-TD-(Meloche-Monnex)">Banque TD (Meloche-Monnex)</option>
                   <option value="Banque_RBC">Banque RBC</option>
				   <option value="Intact">Intact</option>
				   <option value="Assurnat-(BNC)">Assurnat (BNC)</option>
				   <option value="Belairdirect">Belairdirect</option>
				   <option value="Industrielle-Alliance">Industrielle-Alliance</option>
				   <option value="La-Capitale">La Capitale</option>
				   <option value="La-Personnelle">La Personnelle</option>
				   <option value="Pafco">Pafco</option>
				   <option value="RSA-(Union Canadienne)">RSA (Union Canadienne)</option>
				   <option value="SSQ">SSQ</option>
				   <option value="Unique">Unique</option>
				   <option value="Wanessa">Wanessa</option>
				</select>
              </div>
            </div>
            <!-- /.col --> 
          </div>
          
                                        
									</div>
								</div>
							</div>
          </div>
          </div>
          <!-- /.col -->
         
        
 
          <!-- /.col -->
          <div class="claerfix"></div>
                   
        </div><!--clo md-7-->
       <div class="col-md-6">
       
       <div class="panel-tab clearfix">
								<ul class="tab-bar">
									
                                    
                                   
                                    <li  class="active" ><a href="#profile1" id="btn2" onclick='auto1()' data-toggle="tab"><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="icons/New Icons/Car.png"  /> AUTO</a></li>
                                    
                                    <li><a href="#message1" data-toggle="tab" onclick='home1()' id="btn_home1"><i style="font-size: 19px;" class="fa fa-home"></i> HOME</a></li>
                                    <li ><a  href="#enter"  data-toggle="tab"  onclick='note1()' id="btn_note1"><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="icons/New Icons/Enterprise.png"  /> Enterprise</a></li>
                                    
                                    <li ><a  href="#home1"  data-toggle="tab"  ><img style="width: 35px; margin-top: -10px; margin-bottom: -10px;" src="icons/New Icons/Notes.png"  /> NOTES</a></li>

								</ul>
							</div>
							<div class="panel-body" style="border: 1px solid rgb(191, 191, 191);">
								<div class="tab-content">
                                
                                    <div class="tab-pane fade" id="home1">
                                    <textarea name="notes" class="form-control" rows="10"><?php echo $row['notes']; ?></textarea>
									</div>
									<div class="tab-pane fade in active" id="profile1">
                                   
										 <div class="input-group" style="margin-top: 11px;">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159);">
			      <label class="label-checkbox no-padding">
                  <?php
                    
                    if (in_array("chkbox1_auto", $check1))
                    {
                    ?>
			           <input  type="checkbox" name="chkbox_auto[]" value="chkbox1_auto" checked  >
                       <?php
					   }
					   else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_auto[]" value="chkbox1_auto"   >

                       <?php
					   }
					   ?>
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
            <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Revoked :</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Over the past 36 months, have you had your driver’s license suspended or revoked or are you currently waiting for a judgment following an offence under the hinghway code? is any one of the drivers under the contract in situation? </textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
                    <?php
                    
                    if (in_array("chkbox2_auto", $check1))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_auto[]" value="chkbox2_auto" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_auto[]" value="chkbox2_auto" >

                       <?php
					   }
					   ?>
                       
                       
			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>(PERS) criminal record :</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living at your address or driving this (these) vehicule(s), had a criminal record within the past 10 years?</textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
 <?php
                    
                    if (in_array("chkbox3_auto", $check1))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_auto[]" value="chkbox3_auto" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_auto[]" value="chkbox3_auto" >

                       <?php
					   }
					   ?>			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	        <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Declined, cancelled or non-renewed  by a previous carrier(auto) :         
</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you or any other person driving the vehicle(s),received notice of non-renewal, or had your insurance contract cancelled revoked or declined by another insurer over the past 36 months? </textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
 <?php
                    
                    if (in_array("chkbox4_auto", $check1))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_auto[]" value="chkbox4_auto" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_auto[]" value="chkbox4_auto" >

                       <?php
					   }
					   ?>			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Conditions : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person driving this vehicles had conditions imposed by another over the past 36 months?       </textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
 <?php
                    
                    if (in_array("chkbox5_auto", $check1))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_auto[]" value="chkbox5_auto" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_auto[]" value="chkbox5_auto" >

                       <?php
					   }
					   ?>			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Auto claims  : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="4" data-required="true" disabled>Over the past 5 years, have you or one of the aforementions drivers been involved in an accident, regardless of who was liable or have any of you had to file claims following theft, vandalism, broken windshields?</textarea>
			</div>
            
            
            
            
           <!-- /.col -->
									</div>
                                     
									<div class="tab-pane fade" id="message1">
                                    <div class="input-group" style="margin-top: 11px;">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159);">
			      <label class="label-checkbox no-padding">
 <?php
                    
                    if (in_array("chkbox1_home", $check1_home))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_home[]" value="chkbox1_home" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_home[]" value="chkbox1_home" >

                       <?php
					   }
					   ?>			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
            <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>(PERS) criminal record  :</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, any owner or any other person living at your address, had a criminal record within the past 10 year?</textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
<?php
                    
                    if (in_array("chkbox2_home", $check1_home))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_home[]" value="chkbox2_home" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_home[]" value="chkbox2_home" >

                       <?php
					   }
					   ?>					              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Declined, cancelled or non-renewed by a<br/> previous carrier(prop):</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, received notice of non-renewal, or had your insurance contract cancelled,revoked or declined by another over the past 36 months?</textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
<?php
                    
                    if (in_array("chkbox3_home", $check1_home))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_home[]" value="chkbox3_home" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_home[]" value="chkbox3_home" >

                       <?php
					   }
					   ?>					              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	        <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Conditions :         
</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, had  conditions imposed by another insurer over the past 36 months? </textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
<?php
                    
                    if (in_array("chkbox4_home", $check1_home))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_home[]" value="chkbox4_home" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_home[]" value="chkbox4_home" >

                       <?php
					   }
					   ?>					              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Property claims  : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Over the past 5 years, have you sustained any claims concerning this residence or other addresses for theft, vandalism, fire or other types of claims?   </textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
<?php
                    
                    if (in_array("chkbox5_home", $check1_home))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_home[]" value="chkbox5_home" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_home[]" value="chkbox5_home" >

                       <?php
					   }
					   ?>					              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Previous water damage : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="5" data-required="true" disabled>To the best of your knowledge has this residence over the past fice year sustained any water damage, such as sewage backups, entrance of water below the ground floor or through the roof, an overflow  household application, problems with  water in the spring or entrance of water through  crack in the foundation or not they are covered. </textarea>
			</div>
            
            
            
            
           <!-- /.col -->
            
            
            
									</div>
                                    
                                    
                                    <div class="tab-pane fade" id="enter">
                                    <div class="input-group" style="margin-top: 11px;">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159);">
			      <label class="label-checkbox no-padding">
 <?php
                    
                    if (in_array("chkbox1_enter", $check1_enter))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_enter[]" value="chkbox1_enter" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_enter[]" value="chkbox1_enter" >

                       <?php
					   }
					   ?>			              <span class="custom-checkbox"></span>
				    </label>
			  </span>
            <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>(PERS) criminal record  :</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, any owner or any other person living at your address, had a criminal record within the past 10 year?</textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
<?php
                    
                    if (in_array("chkbox2_enter", $check1_enter))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_enter[]" value="chkbox2_enter" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_enter[]" value="chkbox2_enter" >

                       <?php
					   }
					   ?>					              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Declined, cancelled or non-renewed by a<br/> previous carrier(prop):</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, received notice of non-renewal, or had your insurance contract cancelled,revoked or declined by another over the past 36 months?</textarea>
			</div>
           <!-- /.col -->
           
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
<?php
                    
                    if (in_array("chkbox3_enter", $check1_enter))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_enter[]" value="chkbox3_enter" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_enter[]" value="chkbox3_enter" >

                       <?php
					   }
					   ?>					              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	        <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Conditions :         
</strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Have you, or any other person living under your roof, had  conditions imposed by another insurer over the past 36 months? </textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
<?php
                    
                    if (in_array("chkbox4_enter", $check1_enter))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_enter[]" value="chkbox4_enter" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_enter[]" value="chkbox4_enter" >

                       <?php
					   }
					   ?>					              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Property claims  : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="3" data-required="true" disabled>Over the past 5 years, have you sustained any claims concerning this residence or other addresses for theft, vandalism, fire or other types of claims?   </textarea>
			</div>
            
            <div class="input-group">
			   <span class="input-group-addon" style="background:rgb(25, 123, 159); color:#fff;">
			      <label class="label-checkbox no-padding">
<?php
                    
                    if (in_array("chkbox5_enter", $check1_enter))
                    {
                    ?>
			           <input type="checkbox" name="chkbox_enter[]" value="chkbox5_enter" checked>
                       <?php
					   }
                        else
					   {
					   ?>
                       			           <input  type="checkbox" name="chkbox_enter[]" value="chkbox5_enter" >

                       <?php
					   }
					   ?>					              <span class="custom-checkbox"></span>
				    </label>
			  </span>
	      <p style="background: rgb(25, 123, 159) none repeat scroll 0% 0%;width: 100% !important;margin-bottom: 0px;margin-top: 1px;color: rgb(255, 255, 255);font-size: 14px;">  <strong>Previous water damage : </strong></p>
<textarea style="background:rgb(25, 123, 159); color:#fff;" class="form-control" placeholder="Comment Section..." rows="5" data-required="true" disabled>To the best of your knowledge has this residence over the past fice year sustained any water damage, such as sewage backups, entrance of water below the ground floor or through the roof, an overflow  household application, problems with  water in the spring or entrance of water through  crack in the foundation or not they are covered. </textarea>
			</div>
            
            
            
            
           <!-- /.col -->
            
            
            
									</div>
                                    
								</div>
							</div>
						</div><!-- /panel -->
        
        </div><!--clo md-5-->
        
        
        
        </div>
          <div class="row">
        <div class="panel-footer text-center">
<!--          <button class="btn btn-success" type="reset">Clear</button> -->
        </div>
        </div>
      </form>
      <?php
	  }
	  ?>
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
	      '<div  id="product' + counter + '"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"> <div class="form-group"><label class="control-label">Product</label><select class="form-control input-sm parsley-validated" data-required="true" name="product[]"><option value="product1">Product1</option><option value="product2">Product2</option><option value="product3">Product3</option><option value="product4">Product4</option><option value="product5">Product5</option></select></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Others</label><input type="text" placeholder="Others" class="form-control input-sm parsley-validated " data-required="true" name="Others[]"></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Capitale</label><input type="text" placeholder="Capitale" class="form-control input-sm parsley-validated " data-required="true" name="Capitale[]"></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"><div class="form-group"><label class="control-label">Effective date</label><div class="input-group"><input type="text" value="" class="datepicker form-control input-sm parsley-validated" placeholder="DD / MM / YYYY" name="effectivedate[]"><span class="input-group-addon"><i class="fa fa-calendar"></i></span></div></div></div></div><div class="row"><div class="col-md-6" id="right_border" style="border-right: medium none ! important;"><div class="form-group"></div></div><div class="col-md-6"> <div class="form-group"><label class="control-label">Insurer field</label><select class="form-control input-sm parsley-validated" data-required="true" name="insurer[]"><option value="Insurer1">Insurer1</option><option value="Insurer2">Insurer2</option><option value="Insurer3">Insurer3</option><option value="Insurer4">Insurer4</option><option value="Insurer5">Insurer5</option></select></div></div></div><div class="row"><div class="col-md-6" style="border-right: medium none ! important;"  id="TextBoxesGroup"><div class="form-group"></div></div><div class="col-md-6"   id=""> <div class="form-group"><label class="control-label">Status</label><select class="form-control input-sm parsley-validated " data-required="true" name="status[]"><option value="Recall">Recall</option><option value="Premium Gap">Premium Gap</option><option value="Refused">Refused</option><option value="Client">Client</option></select></div></div></div> <br />');
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");

				
	counter++;
     });

     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more section to remove");
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
