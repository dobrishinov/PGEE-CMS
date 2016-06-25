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
                    <p><a href="index.php?c=about" role="button" class="btn btn-primary btn-lg">About me</a>
                    </p>
                </div>
                <!--JUMBOTRON-END-->


                <!--LATEST-PROJECTS-START-->
                <div class="ibox-content">
                    <h2>Latest Projects</h2>
                    <div class="row">

                        <?php foreach ($projects as $project): ?>
                            <div class="col-md-3 animated fadeInRight">
                                <div class="ibox">
                                    <div class="ibox-content product-box">
                                        <div class="product-imitation">
                                            <img class="img-responsive" style="width: 250px; height: 185px;" src="admin/uploads/projectsImages/thumbnails/<?php echo $project->getImage(); ?>" alt="">
                                        </div>
                                        <div class="product-desc">
                                        <span class="product-price">
                                            <?php echo $project->getTitle(); ?>
                                        </span>
                                            <a href="index.php?c=projects&m=show&id=<?php echo $project->getId(); ?>" class="product-name"> <?php //echo substr($project->getTitle(), 0, 40); ?></a>
                                            <small class="text-muted">Category: <?php echo substr($project->getCategoryName(), 0, 30); ?></small>
                                            <br>
                                            <small class="text-muted">Date: <?php echo $project->getDate(); ?></small>
                                            <hr>
                                            <div class="small m-t-xs">
                                                <?php echo substr($project->getDescription(), 0, 37)." ..."; ?>
                                            </div>
                                            <hr>
                                            <div class="m-t text-righ">
                                                <a href="index.php?c=projects&m=show&id=<?php echo $project->getId(); ?>" class="btn btn-xs btn-outline btn-primary">View <i class="fa fa-desktop"></i>
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