<div class="container-fluid bg-dark text-light p-5">
    <div class="row">
        <div class="col">
            <div class="mb-3">
                <h1><?= htmlentities($show->title) ?></h1>
                <p><?= htmlentities($show->description) ?></p>
                <!--<a href="#" class="btn btn-outline-light">Play S1E1</a>-->
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
        <?php foreach ($seasons as $season) : ?>
            <a class="season-link nav-link <?= ($selected_season == $season->id ? 'text-dark bg-light' : 'text-light') ?>" href="?seasonid=<?= $season->id ?>" data-id="<?=$season->id?>">Season <?= $season->object_order ?></a>
        <?php endforeach; ?>
    </nav>
</div>

<?php // Seasons of the selected season 
?>
<div class="container my-5" id="episodes-holder">
    <div class="text-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>


<script>
    $(function() {
        <?php if ($selected_season) : ?>
            $('#episodes-holder').load("<?= site_url('home/season_ajax/' . $selected_season) ?>");
        <?php endif; ?>

    });
    $('.season-link').click(function (e) {
        e.preventDefault();
        let seasonId = $(this).attr('data-id');
        activateSeasonLink(seasonId);
        $('#episodes-holder').html(`
            <div class="text-center">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        `);
        $('#episodes-holder').load("<?= site_url('home/season_ajax/') ?>" + seasonId);
    });

    function activateSeasonLink(activeId = 0) {
        $('.season-link').each(function (i) {
            if ($(this).attr('data-id') == activeId) {
                $(this).removeClass('text-light').addClass('text-dark bg-light');
            } else {
                $(this).addClass('text-light').removeClass('text-dark bg-light');
            }
        });
    }
</script>
