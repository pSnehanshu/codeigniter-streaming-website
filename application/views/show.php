<div class="container-fluid bg-dark text-light p-5">
    <div class="row">
        <div class="col">
            <div>
                <h1><?= htmlentities($show->title) ?></h1>
                <p><?= htmlentities($show->description) ?></p>
                <a href="#" class="btn btn-outline-light">Play S1E1</a>
            </div>
        </div>
        <div class="col">
            <div class="d-flex justify-content-center">
                <div>
                    <img src="<?= htmlentities($show->thumbnail) ?>" alt="<?= htmlentities($show->title) ?>" style="max-height: 500px;">
                </div>
            </div>
        </div>
    </div>
</div>

<?php // Season navbar 
?>
<div class="container-fluid bg-dark text-light px-5">
    <nav class="nav justify-content-center">
        <?php $i = 1;
        foreach ($seasons as $season) : ?>
            <a class="nav-link text-light" href="?seasonid=<?= $season->id ?>">Season <?= $i ?></a>
            <?php $i++;
        endforeach; ?>
    </nav>
</div>

<?php // Seasons of the selected season 
?>
<div class="container my-5" id="episodes-holder">
    <div class="text-center">
        <div class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>


<script>
$(function (){
    <?php if ($selected_season):?>
    $('#episodes-holder').load("<?=site_url('home/season_ajax/'.$selected_season)?>");
    <?php endif;?>
    
});
</script>
