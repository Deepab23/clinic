<?php

$U=$_SESSION['user'];
$FN=$U['FirstName'];
$LN=$U['LastName'];
$EM=$U['Email'];
?>
<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.4.2
Purchase: http://wrapbootstrap.com
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->

<!-- Mirrored from beyondadmin-v1.4.2.s3-website-us-east-1.amazonaws.com/form-layouts.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Nov 2015 03:11:14 GMT -->
<head>
    <meta charset="utf-8" />
    <title>WebApplication</title>

    <meta name="description" content="form layouts" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

	

	
	 <!-- Font CSS (Via CDN) -->
  <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/xassets/skin/default_skin/css/theme.css">

  <!-- Admin Forms CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/xassets/admin-tools/admin-forms/css/admin-forms.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">




</head>
<!-- /Head -->
<!-- Body -->

<body class="dashboard-page">

<!-------------------------------------------------------------+ 
  <body> Helper Classes: 
---------------------------------------------------------------+ 
  '.sb-l-o' - Sets Left Sidebar to "open"
  '.sb-l-m' - Sets Left Sidebar to "minified"
  '.sb-l-c' - Sets Left Sidebar to "closed"

  '.sb-r-o' - Sets Right Sidebar to "open"
  '.sb-r-c' - Sets Right Sidebar to "closed"
---------------------------------------------------------------+
 Example: <body class="example-page sb-l-o sb-r-c">
 Results: Sidebar left Open, Sidebar right Closed
--------------------------------------------------------------->


  <!-- Start: Main -->
  <div id="main">

    <!-----------------------------------------------------------------+ 
       ".navbar" Helper Classes: 
    -------------------------------------------------------------------+ 
       * Positioning Classes: 
        '.navbar-static-top' - Static top positioned navbar
        '.navbar-static-top' - Fixed top positioned navbar

       * Available Skin Classes:
         .bg-dark    .bg-primary   .bg-success   
         .bg-info    .bg-warning   .bg-danger
         .bg-alert   .bg-system 
    -------------------------------------------------------------------+
      Example: <header class="navbar navbar-fixed-top bg-primary">
      Results: Fixed top navbar with blue background 
    ------------------------------------------------------------------->

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top navbar-shadow">
      <div class="navbar-branding">
        <a class="navbar-brand" href="dashboard.html">
           <b>Patient Data System</b>
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>
	  
	  <ul class="nav navbar-nav navbar-right">
			
        <li class="dropdown menu-merge">
          <a data-toggle="dropdown" class="dropdown-toggle fw600 p15" href="#" aria-expanded="false">
          	<img class="mw30 br64" alt="avatar" src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/img/avatars/5.jpg">
          	<span class="hidden-xs pl15"> <?php echo $FN." ".$LN  ?></span>
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul role="menu" class="dropdown-menu list-group dropdown-persist w250">
        
            <li class="list-group-item">
              <a class="animated animated-short fadeInUp" data-toggle="modal" data-target="#myModal3">
                <span class="fa fa-gear"></span> Settings </a>
				
				      <a class="animated animated-short fadeInUp" data-toggle="modal" data-target="#myModal2">
                <span class="fa fa-lock"></span> Change Password </a>
            </li>
            <li class="dropdown-footer">
              <a class="" href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">
              <span class="fa fa-power-off pr5"></span> Logout </a>
            </li>
          </ul>
        </li>
      </ul>
    
      </header>
   
    <!-- Start: Sidebar -->
    <aside id="sidebar_left" class="nano nano-light affix">

      <!-- Start: Sidebar Left Content -->
      <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

          <!-- Sidebar Widget - Author -->
          <div class="sidebar-widget author-widget">
            <div class="media">
              <a class="media-left" href="#">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/img/avatars/3.jpg" class="img-responsive">
              </a>
              <div class="media-body">

                <div class="media-author"><?php echo $FN." ".$LN  ?></div>
              </div>
            </div>
          </div>

 
          <!-- Sidebar Widget - Search (hidden) -->
          <div class="sidebar-widget search-widget hidden">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-search"></i>
              </span>
              <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
            </div>
          </div>

        </header>
        <!-- End: Sidebar Header -->

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">
 
  	
   <?php
		  if($_SESSION['user']['Role']!=3){
		  ?>
          <li>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/users">
              <span class="fa fa-users"></span>
              <span class="sidebar-title"> User	
  Management</span>
             
            </a>
          </li>
		  <?php
		  }
		  ?>
		  
          <li>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/clients">
              <span class="fa fa-users"></span>
              <span class="sidebar-title"> Client</span>
            </a>
          </li>
          <li>
            <a href="dashboard.html">
              <span class="fa fa-users"></span>
              <span class="sidebar-title"> Therapists</span>
            </a>
          </li>
		  
		    <li >
            <a href="dashboard.html">
              <span class="glyphicon glyphicon-home"></span>
              <span class="sidebar-title"> Sessions</span>
            </a>
          </li>
		  
		  
		   <li>
            <a href="dashboard.html">
              <span class="glyphicon glyphicon-home"></span>
              <span class="sidebar-title">Reports</span>
            </a>
          </li>
		  
		  <?php
		  if($_SESSION['user']['Role']==1){
		  ?>
		    <li>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/location">
              <span class="glyphicon glyphicon-home"></span>
              <span class="sidebar-title">Location</span>
            </a>
          </li>
		  
		  <?php
		  }
		  ?>
		  
		  
		      <li>
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">
              <span class="fa fa-sign-out"></span>
              <span class="sidebar-title">Sign Out</span>
            </a>
          </li>
         
        </ul>
   

      </div>
      <!-- End: Sidebar Left Content -->

    </aside>
    <!-- End: Sidebar Left -->

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

		<?php echo $content; ?>
 
  <!-- Begin: Page Footer -->
      
      <!-- End: Page Footer -->

    </section>
    <!-- End: Content-Wrapper -->


  </div>
  
  
  	  <div id="myModal" style="display:none;">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Enter Email" required="">
                </div>
            </div>
        </div>
    </div>
	
	
	  <!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Password</h4>
      </div>
      <div class="modal-body">
	  <div class="alert" style="display:none">
                    <button data-dismiss="alert" class="close" type="button">x</button>
                    <i class="fa fa-ok-sign"></i> <span id="messages"> </span>
                  </div>
        <div class="panel-body">
                      <form class="bs-example form-horizontal" data-validate="parsley" id="formcpasspass">
                        <div class="form-group">
                          <label class="col-lg-4 control-label">Old Password</label>
                          <div class="col-lg-8">
                            <input type="password" placeholder="Old Password" class="form-control" data-required="true" name="opassword" id="opassword">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-4 control-label">Password</label>
                          <div class="col-lg-8">
                            <input type="password" placeholder="Password" data-required="true" class="form-control" name="password" id="password">
                          </div>
                        </div>
						 <div class="form-group">
                          <label class="col-lg-4 control-label">Confirm Password</label>
                          <div class="col-lg-8">
                            <input type="password" placeholder="Confirm Password" data-required="true" data-equalto="#password" class="form-control" name="cpassword" id="cpassword">
                          </div>
                        </div>
                      </form>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="$('#formcpasspass').submit()">Update Password</button>
      </div>
    </div>
  </div>
</div>
  
  

  
  
  	  <!-- Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Settings</h4>
      </div>
      <div class="modal-body">
	  <div class="alert" style="display:none">
                    <button data-dismiss="alert" class="close" type="button">x</button>
                    <i class="fa fa-ok-sign"></i> <span id="messages"> </span>
                  </div>
        <div class="panel-body">
                      <form class="bs-example form-horizontal" data-validate="parsley" id="updateuserinfo">
                        <div class="form-group">
                          <label class="col-lg-4 control-label">First Name</label>
                          <div class="col-lg-8">
                            <input type="text"  class="form-control" data-required="true" name="firstname" value="<?php echo $FN ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-4 control-label">Last Name</label>
                          <div class="col-lg-8">
                             <input type="text"  class="form-control" data-required="true" name="lastname" value="<?php echo $LN ?>">
                          </div>
                        </div>
						
						
						   <div class="form-group">
                          <label class="col-lg-4 control-label">Email</label>
                          <div class="col-lg-8">
                             <input type="text"  class="form-control" data-required="true"  data-email="true" name="email" value="<?php echo $EM ?>">
                          </div>
                        </div>
						
						
						 <div class="form-group">
                          <label class="col-lg-4 control-label">Education</label>
                          <div class="col-lg-8">
						  <div>
                             <input type="checkbox" value="1" id="Users_EBe" name="Users[EB]">	<label for="Users_EB">Bachelor of&nbsp;Kinesiology</label>  
							 
							 </div>
							 
							 <div>
							 
							 <input type="checkbox" value="1" id="Users_ECe" name="Users[EC]">	<label for="Users_EC">Certified	
 &nbsp;Exercise	
 &nbsp;Physiologist</label>   
    &nbsp;
	&nbsp;
	
	</div>
	
	 <div>
<input type="checkbox" value="1" id="Users_EEe" name="Users[EE]">	<label for="Users_EE">Exercise	
 &nbsp;Specialist</label> 
 </div>
                          </div>
                        </div>
						
                      </form>
                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="$('#formcpasspass').submit()">Update</button>
      </div>
    </div>
  </div>
</div>
  
  



  <!-- End: Main -->

  <!-- BEGIN: PAGE SCRIPTS -->

 <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/vendor/jquery/jquery-1.11.1.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

  <!-- Theme Javascript -->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/utility/utility.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/demo/demo.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/main.js"></script>
   <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/parsley/parsley.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/parsley/parsley.extend.js"></script>
  <script src="http://bootboxjs.com/bootbox.js"></script>
  <!-- END: PAGE SCRIPTS -->

</body>


<script>



$("#bootbox-options").on('click', function () {
            bootbox.dialog({
                message: $("#myModal").html(),
                title: "Forget Password",
                className: "modal-darkorange",
                buttons: {
                    success: {
                        label: "OK",
                        className: "btn-blue",
                        callback: function () { }
                    },
                    "Cancel": {
                        className: "btn-danger",
                        callback: function () { }
                    }
                }
            });
        });

		
		
		  $(function() { 
  
  $("#contentx").css({
	  height:$(window).height()
  })
  
    $('#formcpasspass').submit(function(e) { 
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
          
$.ajax({
	url:"<?php echo Yii::app()->request->baseUrl; ?>/users/changepassword/id/<?php echo @$_SESSION['user']['id'] ?>",
	data:$(this).serialize(),
	type:"post",
	success:function(data){
		//alert(data)
		if(data==1){
			$('#messages').text("Password changed successfully")
			$('.alert').removeClass('alert-danger');
			$('.alert').addClass('alert-success');
			
			$('.alert').show();
			
				setTimeout(function(){
				window.location.reload();
			},1500);
		}else{
			$('#messages').text("Please enter correct password")
			$('.alert').removeClass('alert-success');
			$('.alert').addClass('alert-danger');
			$('.alert').show();
			
		}
	}
})			
        }
    });
	


}); 

</script>

</script>

</html>


