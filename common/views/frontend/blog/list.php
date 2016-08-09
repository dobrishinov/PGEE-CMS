<?php require_once __DIR__.'/../include/header.php'?>
<?php require_once __DIR__.'/../include/nav.php'?>

    <!--CONTENT-START-->
    <br>
    <br>
    <br>

    <div class="news-wrap">
        <h2>Блог</h2>
        <div class="content-wrapper clear">

        <?php foreach ($posts as $post): ?>
            <div class="col-3">
                <h3 class="news-head"><?php echo $post->getTitle(); ?></h3>
                <img class="img-responsive" style="width: 1000px; height: 185px;" src="admin/uploads/postsImages/thumbnails/<?php echo $post->getImage(); ?>" alt="">
                <p class="news-content"><?php echo mb_substr($post->getDescription(), 0, 25)." ..."; ?></p>
                <a href="index.php?c=blog&m=show&id=<?php echo $post->getId(); ?>" class="news-link" >Прочети в блога</a>
                <p class="news-date"><?php echo $post->getDate(); ?></p>
            </div>
        <?php endforeach; ?>

        </div>
    </div>



    <!--CONTENT-END-->

<?php require_once __DIR__.'/../include/footer.php'?>