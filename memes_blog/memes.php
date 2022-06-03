<?php
include 'inc/head.php';
include 'func/memeHandler.php';
$memes = getMemes();
?>

<div class="container py-4">
    <h3 class="font-weight-light">Recent Memes</h3>
    <hr>
    <div class="row">
        <?php foreach ($memes as $meme) : ?>
            <div class="col-md-4 my-3 d-flex">
                <div class="card" style="width: 100%;">
                    <img src="<?= $meme['meme_img']; ?>" alt="" class="card-img-top" height="50%">
                    <div class="card-body">
                        <a href="meme.php?id=<?= $meme['id']; ?>">
                            <h3 class="card-title"><?= $meme['meme_title']; ?></h3>
                        </a>
                        <p> <?= substr(strip_tags($meme['meme_body']), 0, 50); ?>...</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between ">
                        <div class="d-flex">
                            <p><?= $meme['username']; ?> |&nbsp;</p>
                            <p><?= date("d M Y", strtotime($meme['date_created'])); ?></p>
                        </div>
                        <a href="#" style="text-decoration: none;">
                            <i class="fa fa-comment mt-1">&nbsp;<?= $meme['cmtcount']  ?></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
include "inc/footer.php";
?>