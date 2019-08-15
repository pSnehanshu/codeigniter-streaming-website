<?php if ($video != null) : ?>
<a class="w3-margin w3-right" href="<?= site_url('home/goto/' . $video->id) ?>" target="_blank">Watch video</a>
<?php endif; ?>

<form action="<?= site_url('admin/video') ?>" method="post">
    <input type="hidden" name="id" value="<?= $video->id ?>">
    <table class="w3-table w3-striped">
        <tr>
            <th>Title</th>
            <td>
                <input class="w3-input w3-border w3-large" type="text" name="title" value="<?= htmlentities($video->title) ?>">
            </td>
        </tr>
        <tr>
            <th>Description</th>
            <td>
                <textarea class="w3-input w3-border" name="description" rows="10"><?= htmlentities($video->description) ?></textarea>
            </td>
        </tr>
        <tr>
            <th>Published</th>
            <td>
                <label class="w3-padding">Yes
                    <input type="radio" name="is_published" value="1" <?= $video->is_published == '1' ? 'checked' : '' ?>>
                </label>
                <label class="w3-padding">No
                    <input type="radio" name="is_published" value="0" <?= $video->is_published == '1' ? '' : 'checked' ?>>
                </label>
            </td>
        </tr>
        <tr>
            <th>Premium</th>
            <td>
                <label class="w3-padding">Yes
                    <input type="radio" name="is_premium" value="1" <?= $video->is_premium == '1' ? 'checked' : '' ?>>
                </label>
                <label class="w3-padding">No
                    <input type="radio" name="is_premium" value="0" <?= $video->is_premium == '1' ? '' : 'checked' ?>>
                </label>
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button type="reset" class="w3-btn w3-white w3-border w3-round">Reset</button>
                <button class="w3-btn w3-blue w3-round">Save</button>
            </td>
        </tr>
    </table>

</form>