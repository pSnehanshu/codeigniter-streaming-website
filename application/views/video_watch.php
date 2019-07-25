<?php $current_user = eflx_current_user(); ?>
<div class="container-fluid p-3 bg-dark">
    <div>
        <?php if ($video->is_premium && !$should_play) : ?>
            <div class="jumbotron">
                <h2 class="display-5">This is a premium content</h2>
                <p class="lead">Subscribe to Eimiflix Premium to enjoy this content and more.</p>
                <hr class="my-4">
                <p>Subscribe now and you can cancel whenever you wish.</p>
                <a class="btn btn-primary btn-lg" href="<?=site_url('home/plans#premium')?>" role="button">Subscribe to Eimiflix Premium</a>
            </div>
        <?php elseif (!$video->is_premium && !$current_user) : ?>
            <div class="jumbotron">
                <h2 class="display-5">Watch this video for free</h2>
                <p class="lead">Join Eimiflix today to enjoy this content and more for free.</p>
                <hr class="my-4">
                <p>You may subscribe to Eimiflix Premium to enjoy premium shows and movies.</p>
                <button type="button" class="btn btn-primary btn-lg" onclick="smsLogin()" role="button">Join Eimiflix now</a>
            </div>
        <?php endif; ?>

        <img src="<?= htmlentities($video->thumbnail) ?>" style="max-width: 70%;" class="d-block mx-auto">
    </div>
</div>

<div class="container mt-4">
    <h1 style="font-size: 23px;"><?= htmlentities($video->title) ?></h1>
    <p><?= htmlentities($video->description) ?></p>
</div>
