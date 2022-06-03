<?php
include "inc/head.php";
include "func/memeHandler.php";

$meme = [];
if(isset($_GET['id'])) {
    $meme = getMeme($_GET['id']);
}

if(isset($_POST['delete'])) {
    $id = $_POST['delete'];
    deleteMeme($id);
}
?>
<div class="container mt-5 py-5">
    <?php if(empty($meme)): ?>
    <h1 class="my-5 py-5 display-4">Post not found!</h1>
    <?php else: ?>
        <div class="jumbotron">
            <img src="<?= $meme['meme_img']; ?>" alt="" width="100%">
            <h1 class="display-4"><?php echo $meme['meme_title']?></h1>
            <p class="lead">
            <?php echo $meme['username'] . " | " . date("d M Y", strtotime($meme['date_created']));?>
            <a href="#" style="text-decoration: none;" class="text-primary">
                  <i class="fa fa-comment mt-1">&nbsp;<?= $meme['cmtcount'] ?></i>
              </a>
            </p>
            
            <hr class="my-4">
            <p><?php echo strip_tags($meme['meme_body']); ?></p>
            <div class="d-flex justify-content-between">
               <a href="index.php"><button class="btn btn-outline-warning btn-sm"> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</button></a> 
               <form action="meme.php" method="post">
                   <input type="hidden" name="delete" value="<?php echo $meme['id']?>">
                   <button class="btn btn-danger btn-sm"> <i class="fa fa-times-circle" aria-hidden="true"></i> Delete</button>
               </form>
            </div>
        </div>
    <?php endif; ?>

</div>

<?php
 include "inc/footer.php";
?>