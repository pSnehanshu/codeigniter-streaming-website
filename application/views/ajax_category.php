<?php if (count($children) > 0) : ?>
    <?php foreach ($children as $object) : ?>
        <a href="<?= site_url('home/goto/' . $object->id) ?>">
            <div class="d-inline-block center-title" style="max-width: 100%;">
                <div class="thumbnail-holder position-relative" data-toggle="tooltip" data-placement="right" data-html="true" title="<?=emflx_trim_description($object->description)?>">
                    <div class="object-type bg-dark text-light px-2 show-on-hover"><?= strtolower($object->type) ?></div>
                    <div class="object-title bg-dark text-light px-3 show-on-hover"><?= $object->title ?></div>
                    <img class="thumbgrow d-none d-lg-block" src="<?= $object->thumbnail ?>" style="height:200px;">
                    <img class="d-lg-none" src="<?= $object->thumbnail ?>" style="height:200px;">
                </div>
                <div class="d-md-none p-2">
                    <p><?= $object->title ?><p>
                    <p class="text-dark"><?=emflx_trim_description($object->description)?></p>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
<?php else : ?>
    <div class="text-center">
        Nothing found here. Keep looking back.
    </div>
<?php endif; ?>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
