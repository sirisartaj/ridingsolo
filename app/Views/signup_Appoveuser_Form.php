<!doctype html>
<html lang="en">
<head>
       <!-- META DATA -->
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="">
	<meta name="google-signin-client_id" content="848882668570-n8u041rjgmam2p242qqroposiensv3pp.apps.googleusercontent.com">

	<!-- FAVICON -->
	<link rel="shortcut icon" type="image/x-icon" href="http://vyz.bz/ridingsolo_admin/assets/images/brand/logo-2.png"/>

	<!-- TITLE -->
	<title>Riding Solo </title>

	<!-- BOOTSTRAP CSS -->
	<link id="style" href="http://vyz.bz/ridingsolo_admin/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<!-- STYLE CSS -->
	<link href="http://vyz.bz/ridingsolo_admin/assets/css/style.css" rel="stylesheet" />
	<link href="http://vyz.bz/ridingsolo_admin/assets/css/skin-modes.css" rel="stylesheet" />

	<!--- FONT-ICONS CSS -->
	<link href="http://vyz.bz/ridingsolo_admin/assets/css/icons.css" rel="stylesheet" />
	<!-- JQUERY JS -->
        <script src="http://vyz.bz/ridingsolo_admin/assets/js/jquery.min.js"></script>
        
</head>

<body class="ltr login-img">
	<!-- GLOABAL LOADER -->
	<div id="global-loader">
		<img src="http://vyz.bz/ridingsolo_admin/assets/images/loader.svg" class="loader-img" alt="Loader">
	</div>
	<!-- /GLOABAL LOADER -->

	<!-- PAGE -->
	<div class="page">
		<div class="container-login100">
			<div class="wrap-login100 p-0">
				<div class="card-body">
					<div class="col col-login mx-auto text-center mb-5">
			<a href="index.php" class="text-center">
				<img src="http://vyz.bz/ridingsolo_admin/assets/images/brand/logo.png" class="header-brand-img login_logo" alt="">
			</a>
		</div>
		<div class="col-lg-12 p-l-0 p-r-0">
      <div class="register-div col-sm-12 p-r-0">
        <div class="col-lg-12 p-l-0 p-r-0 m-t-0">
          <h2>New to Riding Solo?Fill the form </h2>
          <form id="register_form" name="register_form" class="contact_form double-form" novalidate="novalidate" action="<?php echo base_url();?>/storeregiuser" method="post" onSubmit="return subform();">
              <ul>
                <li>

                  <label>First Name<span>*</span></label>
                  <input type="text" class="form-control" name="user_fname" placeholder="Enter your first name" value="<?php echo $user['user_fname'];?>" id="uname">
                  <span id="uname_error" class="text-danger"></span> 
                </li>
                <li>
                  <label>Last Name<span>*</span></label>
                  <input type="text" class="form-control" name="user_lname" placeholder="Enter your last name" value="<?php echo $user['user_lname'];?>" id="ulname">
                  <span id="ulname_error" class="text-danger"></span> 
                </li>
              </ul>
              <ul>
                <li>
                    <label>Email <span>*</span></label>
                    <input type="text" class="form-control" name="user_email" placeholder="Enter your email" readonly="" value="<?php echo $user['user_email'];?>" id="email">
                    <span id="email_error" class="text-danger"></span> 
                </li>
                <li>
                    <label>Mobile <span>*</span></label>
                    <input type="text" class="form-control" name="user_mobile" placeholder="Enter your mobile number" value="<?php echo $user['user_mobile'];?>" id="mobile">
                    <span id="mobile_error" class="text-danger"></span> 
                </li>
              </ul>
              <ul>
                
                <li>
                  <label>Gender <span>*</span></label>
                  <select class="select-box" name="user_gender" id="gender">
                      <option value="">Select Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                  </select>
                  <span id="gender_error" class="text-danger"></span> 
                </li>
              </ul>
              <ul>
                <li>
                  <label>Password</span><span>*</span></label>
                  <input type="password" class="form-control" name="user_password" placeholder="Password" value="" id="pwd">

                   <span id="pwd_error" class="text-danger"></span> 
                </li>
                <li>
                  <label>Confirm Password<span>*</span></label>
                  <input type="password" class="form-control" name="cpassword" placeholder="Password" id="cpwd">
                </li>
              </ul>
              <ul>
                <li class="user_dob">
                  <label>user_dob <span>*</span></label>
                   <input type="text" id="datepicker" name="user_dob" value="" class="form-control datepicker">
                </li>
              </ul>
              <input type="hidden" name="user_id" value="<?php echo $user['user_id'];?>">
              <input type="hidden" name="user_level" value="1">
              <button type="submit" id="div1" class="btn btn-primary m-t-10" name="register">Register<i class="ti-arrow-circle-right"></i></button>
            </form>
          </div>
        </div>
      </div>
		</div>
		</div>
		</div>
		<!-- End PAGE -->


		<!-- BACKGROUND-IMAGE CLOSED -->

		        
        

        <!-- BOOTSTRAP JS -->
        <script src="http://vyz.bz/ridingsolo_admin/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="http://vyz.bz/ridingsolo_admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="http://vyz.bz/ridingsolo_admin/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

        <!-- STICKY JS 
        <script src="http://vyz.bz/ridingsolo_admin/assets/js/sticky.js"></script>-->

        <!-- COLOR THEME JS -->
        <script src="http://vyz.bz/ridingsolo_admin/assets/js/themeColors.js"></script>

        <!-- CUSTOM JS -->
        <script src="http://vyz.bz/ridingsolo_admin/assets/js/custom.js"></script>
<script type="text/javascript">
	$('.datepicker').datepicker({
	    
	});

$('#register_form').on('submit', function(e){
        e.preventDefault();
        alert('sdsfsd');
        return false;
    });
    function subform(){
    	var error=0;
        var len = $('#uname').val().length;
        if($('#uname').val().length < 1){
        	error=1;
        	$('#uname_error').html(' First name is required');
        }
        if($('#ulname').val().length < 1){
        	error=1;
        	$('#ulname_error').html(' Last name is required');
        }
        if($('#email').val().length <1){
        	error=1;
        	$('#email_error').html(' Email is required');
        }
        if($('#datepicker').val().length <1){
        	error=1;
        	$('#datepicker_error').html(' Date of bith is required');
        }if($('#pwd').val().length <1){
        	error=1;
        	$('#pwd_error').html(' Password is required');
        }
        if($('#cpwd').val() != $('#pwd').val()){
        	error=1;
        	$('#pwd_error').html('Password and confirm password must be same.');
        }
        if($('#gender').val()==''){
        	error=1;
        	$('#gender_error').html('Gender is required');
        }if($('#mobile').val().length < 10 && $('#mobile').val().length > 15){
        	error=1;
        	$('#mobile_error').html('Please valid mobile');
        }
        if (error==0) {
            this.submit();
        }else{
        	return false;
        }
    }	
</script>
	</body>
</html>
