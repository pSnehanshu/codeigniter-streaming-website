
<link href="https://vjs.zencdn.net/7.6.0/video-js.min.css" rel="stylesheet">

<?php $current_user = eflx_current_user(); ?>
<div class="container-fluid p-3 bg-dark">
    <div>
        <?php if ($video_is_premium && !$should_play) : $is_playing = false; ?>
            <div class="jumbotron">
                <h2 class="display-5">This is a premium content</h2>
                <p class="lead">Subscribe to Eimiflix Premium to enjoy this content and more.</p>
                <hr class="my-4">
                <p>Subscribe now and you can cancel whenever you wish.</p>
                <a class="btn btn-primary btn-lg" href="<?= site_url('home/plans#premium') ?>" role="button">Subscribe to Eimiflix Premium</a>
            </div>
        <?php elseif (!$video_is_premium && !$current_user) : $is_playing = false; ?>
            <div class="jumbotron">
                <h2 class="display-5">Watch this video for free</h2>
                <p class="lead">Join Eimiflix today to enjoy this content and more for free.</p>
                <hr class="my-4">
                <p>You may subscribe to Eimiflix Premium to enjoy premium shows and movies.</p>
                <button type="button" class="btn btn-primary btn-lg" onclick="smsLogin()" role="button">Join Eimiflix now</a>
            </div>
        <?php else : $is_playing = true; ?>
            <!-- Video.js player -->
            <div class="d-block mx-auto" style="max-width: 70%;">
                <video id='the-video' class='video-js vjs-big-play-centered'>
                    <source src='https://eimiflix-videos-sp-741100443704-ap-south-1.s3.ap-south-1.amazonaws.com/free/Music+Video/GOL+NANG+NGAI+IN+BAD+JEEZ.mp4' type='video/mp4'>
                    <p class='vjs-no-js'>
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
                    </p>
                </video>
            </div>
            <script>$(function () { $('#plain-thumb').hide(); });</script>
        <?php endif; ?>

        <?php if (!$is_playing): ?>
            <img id="plain-thumb" src="<?= htmlentities($video->thumbnail) ?>" style="max-width: 70%;" class="d-block mx-auto">
        <?php endif;?>
    </div>
</div>

<div class="container mt-4">
    <h1 style="font-size: 23px;"><?= htmlentities($video->title) ?></h1>
    <p><?= htmlentities($video->description) ?></p>
</div>

<script src='https://vjs.zencdn.net/7.6.0/video.min.js'></script>
<script>
const player = videojs('the-video', {
  autoplay: true,
  controls: true,
  preload: 'auto',
  poster: '<?= htmlentities($video->thumbnail) ?>',
  fluid: true,
  aspectRatio: '16:9',
});
</script>
