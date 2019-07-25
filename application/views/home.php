<div id="mainbanner" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">

        <?php $i = 0; foreach ($banners as $banner):?>
        <li data-target="#mainbanner" data-slide-to="<?=$i?>" class="<?=$i == 0? 'active' : ''?>"></li>
        <?php $i++; endforeach;?>

    </ol>
    <div class="carousel-inner">

        <?php $i = 0; foreach ($banners as $banner):?>
        <div class="carousel-item <?=$i == 0? 'active' : ''?>">
            
            <?php if (!empty(trim($banner->link))):?>
            <a href="<?=site_url($banner->link)?>">
                <img class="d-block w-100" src="<?=htmlentities($banner->image)?>">
            </a>
            <?php else:?>
            <img class="d-block w-100" src="<?=htmlentities($banner->image)?>">
            <?php endif;?>

            <?php if (!empty(trim($banner->caption))):?>
            <div class="carousel-caption d-none d-md-block"><?=$banner->caption?></div>
            <?php endif;?>

        </div>
        <?php $i++; endforeach;?>

    </div>
    <a class="carousel-control-prev" href="#mainbanner" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#mainbanner" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
