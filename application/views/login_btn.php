<form id="accountkit-login-form" method="get" action="https://www.accountkit.com/<?= $app_version ?>/basic/dialog/sms_login/" style="padding:0px; margin: 0px;">
  <input type="hidden" name="app_id" value="<?= $app_id ?>">
  <input type="hidden" name="redirect" value="<?= site_url('auth/accountkit_cb') ?>">
  <input type="hidden" name="state" value="YOUR_CSRF_TOKEN">
  <input type="hidden" name="fbAppEventsEnabled" value=true>
  <input type="hidden" name="debug" value="<?= ENVIRONMENT == 'production' ? 'false' : 'true' ?>">
  <input type="hidden" name="country_code" value="+91">
</form>

<button onclick="smsLogin()" class="btn btn-outline-light">Login</button>

<script>
  function smsLogin() {
    let csrf = $('#accountkit-login-form > input[name=state]').val();
    $('#accountkit-login-form > input[name=state]').val(`${csrf}@${location.href}`);
    $('#accountkit-login-form').submit();
  }
</script>
