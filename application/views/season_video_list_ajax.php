<?php foreach ($videos as $video):?>

<a href="<?=site_url('home/watch/'.$video->slug)?>">
<div class="row mt-2 grow">
    <div class="col-3">
        <img src="<?=htmlentities($video->thumbnail)?>" alt="<?=htmlentities($video->title)?>" class="img-thumbnail" style="max-height:200px;">
    </div>
    <div class="col-9">
        <h2>
            <?=htmlentities($video->title)?>
        </h2>
        <p class="text-dark"><?=htmlentities($video->description)?></p>
    </div>
</div>
</a>
<?php endforeach;?>
