<div>
    <h1 class="w3-margin w3-medium">Enter your password to login</h1>

    <?php if (isset($message) && strlen($message) > 0):?>
    <div class="w3-panel w3-red"><p><?=$message?></p></div>
    <?php endif;?>

    <form action="<?=site_url('/admin/login'.($next == null ? '' : '?next='.urlencode($next)))?>" method="post">
        <div class="w3-row w3-margin">
            <div class="w3-col l6 m6 s8">
                <input class="w3-input w3-border" type="password" name="password" placeholder="Enter admin password" autofocus>
            </div>
            <div class="w3-col l6 m6 s4">
                <button class="w3-btn w3-border w3-blue" type="submit">Login</button>
            </div>
        </div>
    </form>
</div>