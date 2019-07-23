<style>
.center-title{
    text-align: center;
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
}
.object-type{
    width: auto;
    font-size: 12px;
    border-bottom-right-radius: 5px;
}
.object-title{
    bottom: 2px;
    width: 100%;
}
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
    <div class="d-flex">

        <?php foreach ($objects as $object) : ?>
        <a href="<?= site_url('home/goto/' . $object->id . '?ref=' . urlencode($next_ref)) ?>">
            <div class="p-2 grow center-title" style="max-width: 190px;">
                <div class="thumbnail-holder position-relative">
                    <div class="object-type bg-light text-dark border px-2 show-on-hover"><?=strtolower($object->type)?></div>
                    <div class="object-title bg-light text-dark border px-3 show-on-hover"><?= $object->title ?></div>
                    <img src="<?= $object->thumbnail ?>" style="max-height:200px;" class="img-thumbnail">
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
</div>
