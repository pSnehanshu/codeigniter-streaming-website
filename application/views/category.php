<style>
.center-title{
    text-align: center;
}
.thumbnail-holder{
    overflow: hidden;
}
.thumbnail-holder .show-on-hover{
    opacity: 0;
    transition: opacity 0.2s linear;
}
.thumbnail-holder:hover .show-on-hover{
    opacity: 1;
}
.object-type, .object-title{
    position: absolute;
    z-index: 6;
}
.object-type{
    width: auto;
    font-size: 10px;
    border-bottom-right-radius: 5px;
}
.object-title{
    bottom: 0px;
    width: 100%;
    font-size: 14px;
}
.thumbgrow { transition: all .3s ease-in-out; z-index: 5; }
.thumbgrow:hover { transform: scale(1.1); }
</style>
<div class="container-fluid py-3">
    <?php // Breadcrumb ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= site_url('home') ?>">Home</a>
            </li>
            <?php foreach ($ref as $step) : if (empty(trim($step))) continue; ?>
                <li class="breadcrumb-item">
                    <a href="<?= site_url('home/slug/' . $step) ?>"><?= htmlentities($step) ?></a>
                </li>
            <?php endforeach; ?>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlentities($slug) ?></li>
        </ol>
    </nav>

    <?php // Children ?>
    <div class="container-fluid">
        <?php if (count($objects) > 0):?>
            <?php foreach ($objects as $object) : ?>
            <a href="<?= site_url('home/goto/' . $object->id . '?ref=' . urlencode($next_ref)) ?>">
                <div class="d-inline-block center-title" style="max-width: 100%;">
                    <div class="thumbnail-holder position-relative">
                        <div class="object-type bg-dark text-light px-2 show-on-hover"><?=strtolower($object->type)?></div>
                        <div class="object-title bg-dark text-light px-3 show-on-hover"><?= $object->title ?></div>
                        <img class="thumbgrow" src="<?= $object->thumbnail ?>" style="height:200px;">
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
        <?php else:?>
            <div class="text-center">
                Nothing found here. Keep looking back.
            </div>
        <?php endif;?>
    </div>
</div>
