<div>
    <div class="w3-panel w3-right">
        <a class="w3-btn w3-border w3-round w3-blue" href="<?=site_url('admin/video')?>">Add new video</a>
    </div>
    <table class="w3-table w3-striped">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Premium</th>
                <th>Created on</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($videos as $video):?>

            <tr>
                <td>
                    <a href="<?=site_url('admin/video/'.$video->id)?>">
                        <img src="<?=htmlentities($video->thumbnail)?>" width="100">
                    </a>
                </td>
                <td>
                    <a href="<?=site_url('admin/video/'.$video->id)?>"><?=htmlentities($video->title)?></a>
                </td>
                <td><div class="<?=$video->is_premium == 1 ? 'w3-text-green' : 'w3-text-red'?>"><?=$video->is_premium == 1 ? 'Yes' : 'No'?></div></td>
                <td><?=$video->created_on?></td>
            </tr>

            <?php endforeach;?>
        </tbody>
    </table>
</div>