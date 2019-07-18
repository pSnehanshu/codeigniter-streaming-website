<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login to Eimiflix.com</title>
    <script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
</head>

<body>

<button onclick="smsLogin();">Login via SMS</button>

<form action="<?=site_url('auth/accountkit_cb')?>" method="post" id="cbform">
    <input type="hidden" name="code">
    <input type="hidden" name="csrf">
</form>

<script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId:"343289586591707", 
        state:"{{csrf}}", 
        version:"v1.0",
        fbAppEventsEnabled:true,
        redirect:"http://eimiflix.localtest.me/eimiflix/auth/accountkit_cb",
        debug:true,
      }
    );
  };

  // login callback
  function loginCallback(response) {
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      // Send code to server to exchange for access token
      document.querySelector('#cbform>input[name="code"]').value = response.code;
      document.querySelector('#cbform>input[name="csrf"]').value = response.state;
      document.getElementById('cbform').submit();
    }
    else if (response.status === "NOT_AUTHENTICATED") {
      // handle authentication failure
    }
    else if (response.status === "BAD_PARAMS") {
      // handle bad parameters
    }
  }

  // phone form submission handler
  function smsLogin() {
    var countryCode = '+91';
    AccountKit.login(
      'PHONE', 
      {countryCode: countryCode}, // will use default values if not specified
      loginCallback
    );
  }
</script>

</body>

</html>
