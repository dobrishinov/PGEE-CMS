<?php require_once __DIR__.'/include/header.php'?>
<?php require_once __DIR__.'/include/nav.php'?>

    <!--CONTENT-START-->
    <div class="wrapper">
        <div class="container">
            <div class="row animated fadeInRight">
                <br>
                <!--JUMBOTRON-START-->
                <div class="jumbotron">
                    <h1>Do.IT - How the idea was born?</h1>
                    <p>
                        In a hot and boring day, I decided to create this project with the idea that more people will touch what I do.
                        <br>This project aims to show my interesting DIY projects, articles with problems that I have encountered, interesting news, hacked and leaked databases and many other interesting things associated with opensource software, Linux, embedded systems, photography, mountaineering and lifestyles little goofier than the rest.
                    </p>
                    <p><a role="button" class="btn btn-primary btn-lg">About me</a>
                    </p>
                </div>
                <!--JUMBOTRON-END-->


                <!--LATEST-PROJECTS-START-->
                <div class="ibox-content">
                    <h2>Latest Projects</h2>
                    <div class="row">

                        <?php foreach ($posts as $post): ?>
                            <div class="col-md-3 animated fadeInDown">
                            <div class="ibox">
                                <div class="ibox-content product-box">
                                    <div class="product-imitation">
                                        <img style="width: 300px; height: 200px;" class="img-responsive" src="admin/uploads/postsImages/thumbnails/<?php echo $post->getImage(); ?>" alt="">
                                    </div>
                                    <div class="product-desc">
                                    <span class="product-price">
                                        <?php echo $post->getTitle(); ?>
                                    </span>
<!--                                        <a href="#" class="product-name"> Product</a>-->
                                        <small class="text-muted">Category: <?php echo $post->getCategoryName(); ?></small>
                                        <div class="m-t-xs">
                                            <?php echo $post->getDescription(); ?>
                                        </div>
                                        <div class="m-t text-righ">
                                            <a href="index.php?c=blog&m=show&id=<?php echo $post->getId(); ?>" class="btn btn-xs btn-outline btn-primary">Read <i class="fa fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p>
                                    <a href="index.php?c=blog" role="button" class="btn btn-primary btn-lg">Browse all projects</a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <!--LATEST-PROJECTS-END-->

                <br>
                <br>

                <!--LATEST-ARTICLES-START-->
                <div class="ibox-content" id="ibox-content">
                    <h2>Latest Articles</h2>
                    <div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">

                        <?php foreach ($posts as $post): ?>
                            <div class="vertical-timeline-block animated bounceIn">
                                <div class="vertical-timeline-icon navy-bg">
                                    <i class="fa fa-file-text"></i>
                                </div>
                                <div class="vertical-timeline-content">
                                    <a href="index.php?c=blog&m=show&id=<?php echo $post->getId(); ?>" class="btn-link">
                                        <h2>
                                            <?php echo $post->getTitle(); ?>
                                        </h2>
                                    </a>
                                    <div class="small m-b-xs">
                                        <strong><?php echo $post->getAuthorName(); ?></strong> <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $post->getDate(); ?></span>
                                    </div>
                                    <p>
                                        <?php echo $post->getDescription(); ?>
                                    </p>
                                    <div>
                                        <a href="index.php?c=blog&m=show&id=<?php echo $post->getId(); ?>" class="btn btn-primary right">Read</a>
                                    </div>
                                        <span class="vertical-date">
                                           Create Date <br>
                                            <small><?php echo $post->getDate(); ?></small>
                                        </span>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p>
                                <a href="index.php?c=blog" role="button" class="btn btn-primary btn-lg ">Read all articles</a>
                            </p>
                        </div>
                    </div>
                    <br>
                </div>
                <!--LATEST-ARTICLES-END-->

                <br>
                <br>

            </div>
        </div>
    </div>
    <!--CONTENT-END-->

<?php require_once __DIR__.'/include/footer.php'?>