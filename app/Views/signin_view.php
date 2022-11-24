
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
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

							<form class="login100-form validate-form">
								
								<div class="wrap-input100 validate-input">
<input class="input100" type="text" name="user_email" placeholder="user_email" id="user_email">
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
									<a href="<?php echo base_url(); ?>/logincheck" class="login100-form-btn btn-primary">
										Login
									</a>
								</div>
								
							</form>

<div class="g-signin2" data-onsuccess="onSignIn" onClick="signin(this);"></div>


<!-- Display Google sign-in button -->
<div id="gSignIn">signin with google</div>

<!-- Show the user profile details -->
<div class="userContent" style="display: none;"></div>



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
<script>
	// Save user data to the database
function saveUserData(userData){
    $.post('userData.php', { oauth_provider:'google', userData: JSON.stringify(userData) });
}
function signin(googleUser){
	var myParams = {
            'clientid' : '848882668570-n8u041rjgmam2p242qqroposiensv3pp.apps.googleusercontent.com',
            'cookiepolicy' : 'single_host_origin',
            'callback' : 'loginCallback',
            'approvalprompt':'force',
            'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
          };
          gapi.auth.signIn(myParams);
        

}

 function loginCallback(result)
        {
            if(result['status']['signed_in'])
            {
                var request = gapi.client.plus.people.get(
                {
                    'userId': 'me'
                });
                request.execute(function (resp)
                {
                    /* console.log(resp);
                    console.log(resp['id']); */
                    var email = '';
                    if(resp['emails'])
                    {
                        for(i = 0; i < resp['emails'].length; i++)
                        {
                            if(resp['emails'][i]['type'] == 'account')
                            {
                                email = resp['emails'][i]['value'];//here is required email id
                            }
                        }
                    }
                   var usersname = resp['displayName'];//required name
                });
            }
        }
        function onLoadCallback()
        {
            gapi.client.setApiKey('AIzaSyBI3_6sdvrzRoqDA0BYISKAYW0M2mUh57E');
            gapi.client.load('plus', 'v1',function(){});
        }



function onSignIn(googleUser) {


  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}



// Sign-in success callback
function onSuccess(googleUser) {
	console.log('hi i am in');
    // Get the Google profile data (basic)
    //var profile = googleUser.getBasicProfile();
    
    // Retrieve the Google account data
    gapi.client.load('oauth2', 'v2', function () {
        var request = gapi.client.oauth2.userinfo.get({
            'userId': 'me'
        });
        request.execute(function (resp) {
            // Display the user details
            var profileHTML = '<h3>Welcome '+resp.given_name+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></h3>';
            profileHTML += '<img src="'+resp.picture+'"/><p><b>Google ID: </b>'+resp.id+'</p><p><b>Name: </b>'+resp.name+'</p><p><b>Email: </b>'+resp.email+'</p><p><b>Gender: </b>'+resp.gender+'</p><p><b>Locale: </b>'+resp.locale+'</p><p><b>Google Profile:</b> <a target="_blank" href="'+resp.link+'">click to view profile</a></p>';
            document.getElementsByClassName("userContent")[0].innerHTML = profileHTML;
            
            document.getElementById("gSignIn").style.display = "none";
            document.getElementsByClassName("userContent")[0].style.display = "block";
            
            // Save user data
            saveUserData(resp);
        });
    });
}



// Render Google Sign-in button
function renderButton() {
    gapi.signin2.render('gSignIn', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
    });
}

// Sign-in success callback
function onSuccess(googleUser) {
    // Get the Google profile data (basic)
    //var profile = googleUser.getBasicProfile();
    
    // Retrieve the Google account data
    gapi.client.load('oauth2', 'v2', function () {
        var request = gapi.client.oauth2.userinfo.get({
            'userId': 'me'
        });
        request.execute(function (resp) {
            // Display the user details
            var profileHTML = '<h3>Welcome '+resp.given_name+'! <a href="javascript:void(0);" onclick="signOut();">Sign out</a></h3>';
            profileHTML += '<img src="'+resp.picture+'"/><p><b>Google ID: </b>'+resp.id+'</p><p><b>Name: </b>'+resp.name+'</p><p><b>Email: </b>'+resp.email+'</p><p><b>Gender: </b>'+resp.gender+'</p><p><b>Locale: </b>'+resp.locale+'</p><p><b>Google Profile:</b> <a target="_blank" href="'+resp.link+'">click to view profile</a></p>';
            document.getElementsByClassName("userContent")[0].innerHTML = profileHTML;
            
            document.getElementById("gSignIn").style.display = "none";
            document.getElementsByClassName("userContent")[0].style.display = "block";
        });
    });
}

// Sign-in failure callback
function onFailure(googleUser) {
    alert(googleUser.error);
}

// Sign out the user
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        document.getElementsByClassName("userContent")[0].innerHTML = '';
        document.getElementsByClassName("userContent")[0].style.display = "none";
        document.getElementById("gSignIn").style.display = "block";
    });
    
    auth2.disconnect();
}
</script>
 <script type="text/javascript">
       (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
 </script>		        
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
