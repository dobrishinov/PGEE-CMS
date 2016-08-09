<?php require_once __DIR__.'/include/header.php'?>
<?php require_once __DIR__.'/include/nav.php'?>

    <div class="home">
        <div class="info">
            <img src="images/pgee-logo.svg" alt="PGEE Logo">
            <h1>Професионална гимназия по електротехника и електроника - Пловдив</h1>
            <p>ПГЕЕ - Пловдив е държавно, елитно, средно професионално учебно заведение с регионално значение за подготовката на млади хора в сферата на средното образование. В ПГЕЕ - Пловдив се подготвят техници в областта на електротехническата промишленост, електронната промишленост и компютърните технологии.</p>
        </div>
        <div id="scroll-icon">
            <span>&nbsp;</span>
        </div>
    </div>

    <div class="news-wrap">
        <h2>Последни новини</h2>
        <div class="news-container">

        <?php foreach ($projects as $project): ?>
            <div class="news hidden">
                <h3 class="news-head"><?php echo $project->getTitle(); ?></h3>
                <img class="img-responsive" style="width: 1000px; height: 185px;" src="admin/uploads/projectsImages/thumbnails/<?php echo $project->getImage(); ?>" alt="">
                <p class="news-content"><?php echo mb_substr($project->getDescription(), 0, 25)." ..."; ?></p>
                <a href="index.php?c=projects&m=show&id=<?php echo $project->getId(); ?>" class="news-link" >Прочети в блога</a>
                <p class="news-date"><?php echo $project->getDate(); ?></p>
            </div>
        <?php endforeach; ?>

        </div>
        <div class="blog-link">
            <a href="index.php?c=blog">Блог</a>
        </div>
    </div>

    <div class="partners-wrap">
        <h2>Партньори</h2>
        <div class="partners-container">
            <div class="partner hidden">
                <a href="#">
                    <img src="images/evn.png" alt="EVN Logo">
                </a>
            </div>
            <div class="partner hidden">
                <a href="#">
                    <img src="images/toefl.png" alt="toefl Logo">
                </a>
            </div>
            <div class="partner hidden">
                <a href="#">
                    <img src="images/rsvu.png" alt="rsvu Logo">
                </a>
            </div>
            <div class="partner hidden">
                <a href="#">
                    <img src="images/hbs.png" alt="hbs Logo">
                </a>
            </div>
        </div>
    </div>

<?php require_once __DIR__.'/include/footer.php'?>