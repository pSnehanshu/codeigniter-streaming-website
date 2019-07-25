<style>
    html {
        font-size: 14px;
    }

    @media (min-width: 768px) {
        html {
            font-size: 16px;
        }
    }

    .container {
        max-width: 960px;
    }

    .pricing-header {
        max-width: 700px;
    }

    .card-deck .card {
        min-width: 220px;
    }
</style>
<script>
    var is_premium_user = <?= $is_premium_user ? 'true' : 'false' ?>;
    var is_free_user = <?= $is_free_user ? 'true' : 'false' ?>;
</script>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Memberships</h1>
    <p class="lead">Pay monthly, cancel anytime. No paperwork, no annoying long term contracts. Just chill and enjoy.</p>
</div>

<div class="container">
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Free</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">&#8377;0 <small class="text-muted">/ mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Music videos</li>
                    <li>Short videos</li>
                    <li>Comedy videos</li>
                    <li>And all free stuff</li>
                </ul>
                <?php if (!$is_free_user) : ?>
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary" onclick="smsLogin()">Subscribe for free</button>
                <?php else : ?>
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary" disabled>Subscribed</button>
                <?php endif; ?>

            </div>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Premium</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">&#8377;99 <small class="text-muted">/ mo</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>All free stuff, plus</li>
                    <li>Premium web shows</li>
                    <li>Premium movies</li>
                    <li>New shows added every week</li>
                </ul>
                <?php if (!$is_premium_user) : ?>
                    <button type="button" class="btn btn-lg btn-block btn-primary" onclick="joinPremium()">Subscribe to Premium</button>
                <?php else : ?>
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary" disabled>Subscribed</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    const joinPremiumHash = 'joinpremium';
    $(function() {
        var hash = location.hash.substring(1);
        if (joinPremiumHash == hash) {
            pay();
        }
    });

    function joinPremium() {
        location.hash = joinPremiumHash;
        if (!is_free_user) {
            smsLogin();
        } else {
            pay();
        }
    }

    function pay() {
        if (!is_premium_user) {
            alert('Pay now');
        }
    }
</script>
