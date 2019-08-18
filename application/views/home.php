<style>
    .center-title {
        text-align: center;
    }

    .thumbnail-holder {
        overflow: hidden;
    }

    .thumbnail-holder .show-on-hover {
        opacity: 0;
        transition: opacity 0.2s linear;
    }

    .thumbnail-holder:hover .show-on-hover {
        opacity: 1;
    }

    .object-type,
    .object-title {
        position: absolute;
        z-index: 6;
    }

    .object-type {
        width: auto;
        font-size: 10px;
        border-bottom-right-radius: 5px;
    }

    .object-title {
        bottom: 0px;
        width: 100%;
        font-size: 14px;
    }

    .thumbgrow {
        transition: all .3s ease-in-out;
        z-index: 5;
    }

    .thumbgrow:hover {
        transform: scale(1.1);
    }

    .vidlist {
        overflow: auto;
    }
</style>

<div class="bg-dark">
    <div class="container">
        <div id="mainbanner" class="carousel slide mb-4" data-ride="carousel">
            <ol class="carousel-indicators">

                <?php $i = 0;
                foreach ($banners as $banner) : ?>
                <li data-target="#mainbanner" data-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></li>
                <?php $i++;
                endforeach; ?>

            </ol>
            <div class="carousel-inner">

                <?php $i = 0;
                foreach ($banners as $banner) : ?>
                <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">

                    <?php if (!empty(trim($banner->link))) : ?>
                    <a href="<?= site_url($banner->link) ?>">
                        <img class="d-block w-100" src="<?= htmlentities($banner->image) ?>">
                    </a>
                    <?php else : ?>
                    <img class="d-block w-100" src="<?= htmlentities($banner->image) ?>">
                    <?php endif; ?>

                    <?php if (!empty(trim($banner->caption))) : ?>
                    <div class="carousel-caption d-none d-md-block"><?= $banner->caption ?></div>
                    <?php endif; ?>

                </div>
                <?php $i++;
                endforeach; ?>

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
    </div>
</div>

<!-- categories -->
<script>
    const categories = [];
</script>
<div class="container-fluid">
    <?php foreach ($categories as $category) : $id = "category-vids-" . $category->slug; ?>
    <div class="mb-5">
        <h2>
            <a class="text-dark" href="<?= site_url('home/category/' . $category->slug) ?>"><?= htmlentities($category->title) ?></a>
        </h2>
        <div>
            <div id="<?= $id ?>" class="vidlist d-flex">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>

        <script>
            categories.push({
                id: '<?= $id ?>',
                catid: '<?= $category->id ?>'
            })
        </script>
    </div>

    <?php endforeach; ?>

</div>

<script>
    $(function() {
        categories.forEach(category => {
            //$('#' + category.id).load('<?= site_url('home/ajax_category/') ?>' + category.catid);
            $.get('<?= site_url('home/ajax_category/') ?>' + category.catid,
                function(data, status, jqXhr) {
                    var elm = $('#' + category.id);
                    elm.html(data);

                    if (!elm.hasScrollBar('horizontal')) {
                        return;
                    }

                    var leftScroll = $('<button>').html('&#9665;').addClass('btn border float-left d-none d-md-block').height(elm.height());
                    var rightScroll = $('<button>').html('&#9655;').addClass('btn border float-right d-none d-md-block').height(elm.height());

                    // Add functionality
                    var scrollAmt = 500;
                    var scrollSpeed = 400;
                    leftScroll.click(function(e) {
                        //let newScroll = elm.scrollLeft() - scrollAmt;
                        elm.stop().animate({
                            scrollLeft: elm.scrollLeft() - scrollAmt
                        }, scrollSpeed);
                    });
                    rightScroll.click(function(e) {
                        //let newScroll = elm.scrollLeft() + scrollAmt;
                        elm.stop().animate({
                            scrollLeft: elm.scrollLeft() + scrollAmt
                        }, scrollSpeed);
                    });

                    elm.parent().prepend(leftScroll);
                    elm.parent().prepend(rightScroll);
                }
            )
        });
    });
</script>