<div class="container-fluid p-3 bg-dark">
    <div>    
        <img src="<?=htmlentities($video->thumbnail)?>" style="height: 70%;" class="d-block mx-auto">
    </div>
</div>

<div class="container mt-4">
    <h1 style="font-size: 23px;"><?=htmlentities($video->title)?></h1>
    <p><?=htmlentities($video->description)?></p>
</div>
