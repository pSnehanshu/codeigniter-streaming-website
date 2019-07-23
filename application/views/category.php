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
            <div class="p-2 grow" style="max-width: 190px;">
                <a href="<?= site_url('home/goto/' . $object->id . '?ref=' . urlencode($next_ref)) ?>">
                    <img src="<?= $object->thumbnail ?>" style="max-height:200px;" class="img-thumbnail"><br>
                    <p>[<?=strtoupper($object->type)?>] <?= $object->title ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
