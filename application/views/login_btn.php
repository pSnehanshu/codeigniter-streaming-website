<button onclick="smsLogin()" class="btn btn-outline-light">Login</button>

<form action="<?=site_url('auth/accountkit_cb')?>" method="post" id="otpcbform" style="display:none;">
    <input type="hidden" name="code">
    <input type="hidden" name="csrf">
    <input type="hidden" name="next">
</form>

<script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
<script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId: "<?=$app_id?>", 
        state: "{{csrf}}", 
        version: "<?=$app_version?>",
        fbAppEventsEnabled: true,
        redirect: '<?=site_url('auth/accountkit_cb')?>',
        debug: <?= ENVIRONMENT == 'production' ? 'false': 'true' ?>,
      }
    );
  };

  // login callback
  function loginCallback(response) {
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      // Send code to server to exchange for access token
      document.querySelector('#otpcbform>input[name="code"]').value = response.code;
      document.querySelector('#otpcbform>input[name="csrf"]').value = response.state;
      document.querySelector('#otpcbform>input[name="next"]').value = location.href;
      document.getElementById('otpcbform').submit();
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

