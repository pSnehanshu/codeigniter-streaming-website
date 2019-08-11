<?php if (count($children) > 0) : ?>
    <?php foreach ($children as $child) : ?>
        <a href="<?= site_url('home/goto/' . $child->id) ?>">
            <div class="d-inline-block center-title" style="max-width: 100%;">
                <div class="thumbnail-holder position-relative">
                    <div class="object-type bg-dark text-light px-2 show-on-hover"><?= strtolower($child->type) ?></div>
                    <div class="object-title bg-dark text-light px-3 show-on-hover"><?= $child->title ?></div>
                    <img class="thumbgrow d-none d-lg-block" src="<?= $child->thumbnail ?>" style="height:200px;">
                    <img class="d-lg-none" src="<?= $child->thumbnail ?>" style="height:200px;">
                </div>
                <div class="d-md-none p-2">
                    <p><?= $child->title ?><p>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
<?php else : ?>
    <div class="text-center">
        Nothing found here. Keep looking back.
    </div>
<?php endif; ?>