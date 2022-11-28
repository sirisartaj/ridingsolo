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
	</head>

	<body class="ltr login-img">
		<!-- GLOABAL LOADER -->
		<div id="global-loader">
			<img src="http://vyz.bz/ridingsolo_admin/assets/images/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOABAL LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div>
				<!-- CONTAINER OPEN -->
				
				<div class="container-login100">
					<div class="wrap-login100 p-0">
						<div class="card-body">
							<div class="col col-login mx-auto text-center mb-5">
					<a href="index.php" class="text-center">
						<img src="http://vyz.bz/ridingsolo_admin/assets/images/brand/logo.png" class="header-brand-img login_logo" alt="">
					</a>
				</div>

		<form class="login100-form validate-form" id="signinform" action="<?php echo base_url().'/SigninController/loginAuth';?>" method="post">
			
			<div class="wrap-input100 validate-input">
				<input class="input100" type="text" name="user_email" placeholder="user_email">
				<span class="focus-input100"></span>
				<span class="symbol-input100">
					<i class="fe fe-user" aria-hidden="true"></i>
				</span>
			</div>
			<div class="wrap-input100 validate-input">
				<input class="input100" type="password" name="user_password" placeholder="Password">
				<span class="focus-input100"></span>
				<span class="symbol-input100">
					<i class="fe fe-lock" aria-hidden="true"></i>
				</span>
			</div>
			<div class="checkbox">
				<div class="custom-checkbox custom-control">
					<input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
					<label for="checkbox-1" class="custom-control-label mt-1">Remember Me </label>
					<a href="forgot-password.php" class="text-primary ms-1 float-end  mt-1">Forgot Password?</a>

				</div>
			</div>
			
			<div class="container-login100-form-btn">
				<!-- <a href="<?php echo base_url(); ?>/logincheck" class="login100-form-btn btn-primary">
					Login
				</a> -->
				<button type="submit" class="login100-form-btn btn-primary">Login</button>
			</div>
			
		</form>

<!--google signup/signin -->
<script src="https://accounts.google.com/gsi/client" async defer></script>
      <script>
        function handleCredentialResponse(response) {
          console.log("Encoded JWT ID token: " + response.credential);
          console.log("response " + parseJwt(response.credential));
          var token = parseJwt(response.credential);
         a = JSON.stringify(token);
         //console.log(a);
         var obj = jQuery.parseJSON(a);
	  console.log(obj.email);
         
         if(obj.email){
		console.log('hi');
         	

         	$.ajax({
		   method: "POST",            
		   url: "<?php echo base_url(); ?>/checkuser",
		   data: {"email":obj.email,"name":obj.name,"picture":obj.picture,"given_name":obj.given_name,"family_name":obj.family_name},
		   success: function(data) {        
		        console.log(data);
		        
		       var resultdata = $.parseJSON(data);
		        if(data){
		        if(resultdata.status == 200 && resultdata.message=="Added Successfully"){
		         $('#buttonDiv').hide();
  			  $('#signinform').html('Thank you for joining Us.We will send the mail after admin approval.');
		        
		        }else if(resultdata.status == 200 && resultdata.users=="pending"){
		        	 $('#buttonDiv').hide();
		        	$('#signinform').html('Thank you for joining Us.We will send the mail after admin approval.');
		        }else if(resultdata.status == 200 && resultdata.users=="Approved"){
		        	udata = resultdata.usersdata;
		        	email = udata.user_email;
		        	userid = udata.user_id;
		        	upassword = udata.user_password;
		        	uname = udata.user_fname;
		        	complete_rigistration = udata.complete_rigistration;
		        	
		        	console.log(email);
		        	//if(resultdata.status_regi == 'completed'){
		        		/*window.location.href = "<?php //echo base_url().'/SigninController/loginAuth?email=';?>+"data;*/
		        	//}else{
window.location.href = "<?php echo base_url().'/googleregistration/?email=';?>"+email+"&userid="+userid+"&upassword="+upassword+"&uname="+uname+"&complete_rigistration="+complete_rigistration;	
		        	//}
		        	
		        	
		        	
		        }else if(resultdata.status == 200 && resultdata.users=="Reject"){
		        	$('#buttonDiv').hide();
		        	$('#signinform').html('Your Request is rejected Please contact Admin');
		        }else{
		        	alert('not updated');
		        }
		        
		        }else{
		        alert('error');
		        }
		    }
   		});




         }
        }
        window.onload = function () {
          google.accounts.id.initialize({
            client_id: "848882668570-n8u041rjgmam2p242qqroposiensv3pp.apps.googleusercontent.com",
            callback: handleCredentialResponse
          });
          google.accounts.id.renderButton(
            document.getElementById("buttonDiv"),
            { theme: "outline", size: "large" }  // customization attributes
          );
          google.accounts.id.prompt(); // also display the One Tap dialog
        }

        function parseJwt (token) {
    var base64Url = token.split('.')[1];
    var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));

    return JSON.parse(jsonPayload);
}
    </script>
<!--google signup/signin -->


 <div id="buttonDiv"></div> 


						</div>
						<div class="card-footer">
							<div class="d-flex justify-content-center my-3">
								<a href="javascript:void(0)" class="social-login  text-center me-4">
									<i class="fa fa-google"></i>
								</a>
								<a href="javascript:void(0)" class="social-login  text-center me-4">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="javascript:void(0)" class="social-login  text-center">
									<i class="fa fa-twitter"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- CONTAINER CLOSED -->
			</div>
		</div>
		<!-- End PAGE -->


		<!-- BACKGROUND-IMAGE CLOSED -->

		        
        <!-- JQUERY JS -->
        <script src="http://vyz.bz/ridingsolo_admin/assets/js/jquery.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="http://vyz.bz/ridingsolo_admin/assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="http://vyz.bz/ridingsolo_admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="http://vyz.bz/ridingsolo_admin/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

        <!-- STICKY JS -->
        <script src="http://vyz.bz/ridingsolo_admin/assets/js/sticky.js"></script>

        <!-- COLOR THEME JS -->
        <script src="http://vyz.bz/ridingsolo_admin/assets/js/themeColors.js"></script>

        <!-- CUSTOM JS -->
        <script src="http://vyz.bz/ridingsolo_admin/assets/js/custom.js"></script>

	</body>
</html>
