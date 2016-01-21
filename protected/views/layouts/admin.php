<?php

$U=$_SESSION['user'];
$FN=$U['FirstName'];
$LN=$U['LastName'];
$EM=$U['Email'];
$isAdmin=$U['Admin'];

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
<style>
#skyline{
	padding:20px;
}
</style>
    <meta name="description" content="form layouts" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/jquery.min.js"></script>
    <!--Basic Styles-->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/xassets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/xassets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/xassets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link  href="<?php echo Yii::app()->request->baseUrl; ?>/xassets/css/beyond.min.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/xassets/css/demo.min.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/xassets/css/typicons.min.css" rel="stylesheet" />
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/xassets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/skins.min.js"></script>
	

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
   
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                   <a class="navbar-brand" href="#" style="margin-top: 8px; font-weight: 600;">
                        <small style="margin-top: 22px;">
                            Musicians Theme Guru Team
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area"><li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/img/avatars/adam-jansen.jpg">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span><?php echo $FN.' '.$LN ?></span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                       <li class="username"><a><?php echo $FN.' '.$LN ?></a></li>
                                
                                 
                                    <li>
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin">
                                            admin
                                        </a>
                                    </li>
									
										  <li>
                                        <a data-toggle="modal" data-target="#myModal2" >Change Password</a>
                                    </li>
									
                                    <li>
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">
                                            Sign out
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                            <!-- Settings -->
                        </ul>
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
	
	
	   <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">

            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li class="active">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/users">
                            <i class="menu-icon glyphicon glyphicon-user"></i>
                            <span class="menu-text"> Users </span>
                        </a>
                    </li>
                    <!--Databoxes-->
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/project/">
                            <i class="menu-icon glyphicon glyphicon-tasks"></i>
                            <span class="menu-text">Project </span>
                        </a>
                    </li>
                    <!--Widgets-->
                    <li>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/section/">
                            <i class="menu-icon fa fa-th"></i>
                            <span class="menu-text"> Section </span>
                        </a>
                    </li> 
					
					<li>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/questions/">
                            <i class="menu-icon fa fa-question "></i>
                            <span class="menu-text"> Question </span>
                        </a>
                    </li>
					
					</ul>
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
          
            <!-- Page Content -->
            <div class="page-content">
               
			   <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        
                        <li class="active"><?php echo  $this->pageTitle; ?></li>
                    </ul>
                </div>
				
			   <div class="page-body">
	<?php echo $content; ?>
	</div>
            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

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
  
  




	
	  <!--Basic Scripts-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/parsley/parsley.min.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/parsley/parsley.extend.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/xassets/js/beyond.min.js"></script>


	<style>
	
	.grid-view .button-column {
  text-align: center;
  width: 100px;
}
	</style>
	
	<script>
	
		  $(function() { 
  
  $("#contentx").css({
	  height:$(window).height()
  })
  
    $('#formcpasspass').submit(function(e) { 
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
          
$.ajax({
	url:"<?php echo Yii::app()->request->baseUrl; ?>/users/changepassword/id/<?php echo @$_SESSION['user']['Id'] ?>",
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
			},2000);
			
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
</body>
<!--  /Body -->

</html>


