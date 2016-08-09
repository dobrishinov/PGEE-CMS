<?php require_once __DIR__.'/../include/header.php'?>
<?php require_once __DIR__.'/../include/nav.php'?>

    <!--CONTENT-START-->
    <br><br><br><br>

    <div class="content-wrapper">
        <div class="col-1">
            <h2>
                <?php echo $navSchool->getTitle(); ?>
            </h2>

            <br><br>

            <h3>
                <span class="font-noraml"><?php echo $navSchool->getDescription();?></span>
            </h3>

            <br>
            <?php echo htmlspecialchars_decode($navSchool->getContent());?>
            <br>
            <h5>
                <span class="pull-right font-noraml"> <i class="fa fa-clock-o"></i> <?php echo $navSchool->getDate(); ?></span>
                <span class="font-noraml">Author <i class="fa fa-pencil-square-o"></i> </span><?php echo $navSchool->getAuthorName();?>
            </h5>
        </div>
    </div>

<?php require_once __DIR__.'/../include/footer.php'?>