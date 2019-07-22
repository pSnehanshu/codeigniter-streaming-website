<?php foreach ($videos as $video):?>

<div class="row mt-2">
    <div class="col-3">
        <a href="<?=site_url('home/watch/'.$video->slug)?>">
            <img src="<?=htmlentities($video->thumbnail)?>" alt="<?=htmlentities($video->title)?>" class="img-thumbnail" style="max-height:200px;">
        </a>
    </div>
    <div class="col-9">
        <h2>
            <a href="<?=site_url('home/watch/'.$video->slug)?>"><?=htmlentities($video->title)?></a>
        </h2>
        <p><?=htmlentities($video->description)?></p>
    </div>
</div>

<?php endforeach;?>
