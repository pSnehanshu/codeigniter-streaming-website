<?php if (count($videos) > 0):?>
    <?php foreach ($videos as $video):?>

    <a href="<?=site_url('home/watch/'.$video->slug)?>">
    <div class="row mt-2">
        <div class="col-lg-3">
            <img src="<?=htmlentities($video->thumbnail)?>" alt="<?=htmlentities($video->title)?>" class="img-thumbnail" style="width: 300px;">
        </div>
        <div class="col-lg-9">
            <?php $title = 'Episode ' . $video->object_order . '-' . htmlentities($video->title); ?>
            
            <h2 class="d-none d-lg-block"><?=$title?></h2>
            <h2 class="d-lg-none" style="font-size: 21px;"><?=$title?></h2>
            <p class="text-dark"><?=htmlentities($video->description)?></p>
        </div>
    </div>
    </a>
    <?php endforeach;?>
<?php else:?>
    <p class="text-center">Oops! No videos for now. Keep looking for the infinity stones.</p>
<?php endif;?>
