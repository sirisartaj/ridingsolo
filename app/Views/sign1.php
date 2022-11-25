<html itemscope itemtype="http://schema.org/Article">
<head>
	<meta name="google-signin-client_id" content="848882668570-n8u041rjgmam2p242qqroposiensv3pp.apps.googleusercontent.com">
  <!-- BEGIN Pre-requisites -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
  </script>

  <script src="https://apis.google.com/js/client:platform.js?onload=start" async defer>
  </script>
  <!-- END Pre-requisites -->

  
  <!-- Continuing the <head> section -->
  <script>
    function start() {
      gapi.load('auth2', function() {
        auth2 = gapi.auth2.init({
          client_id: '848882668570-n8u041rjgmam2p242qqroposiensv3pp.apps.googleusercontent.com',
          // Scopes to request in addition to 'profile' and 'email'
          //scope: 'additional_scope'
        });
      });
    }
  </script>
</head>
<body>

	<!-- Add where you want your sign-in button to render -->
<!-- Use an image that follows the branding guidelines in a real app -->
<button id="signinButton">Sign in with Google</button>
<script>
  $('#signinButton').click(function() {
    // signInCallback defined in step 6.
    auth2.grantOfflineAccess().then(signInCallback);
  });
</script>
<!-- Last part of BODY element in file index.html -->
<script>
function signInCallback(authResult) {
	console.log(authResult);
  if (authResult['code']) {

    // Hide the sign-in button now that the user is authorized, for example:
    $('#signinButton').attr('style', 'display: none');

    // Send the code to the server
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."/storelogin" ?>',
      // Always include an `X-Requested-With` header in every AJAX request,
      // to protect against CSRF attacks.
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      },
      contentType: 'application/octet-stream; charset=utf-8',
      success: function(result) {
        // Handle or verify the server response.
        alert('in signincallback success');
      },
      processData: false,
      data: authResult['code']
    });
  } else {
  	alert('auth result is empty');
    // There was an error.
  }
}
</script>
  <!-- ... -->
</body>
</html>