<?php require_once __DIR__.'/../include/header.php'?>
<?php require_once __DIR__.'/../include/nav.php'?>

    <!--CONTENT-START-->
    <div class="wrapper">
        <div class="container">
            <!--PAGE-HEADING-START-->
            <div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
                <div class="col-lg-8">
                    <h2>Blog</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="index.php?c=blog">Blog</a>
                        </li>
                        <li>
                            <a><?php echo $post->getTitle();?></a>
                        </li>
                    </ol>
                </div>
                <br>
                <div class="col-lg-4">
                    <form class="navbar-form navbar-left" role="search" action="" method="get">
                        <div class="form-group">
                            <input type="hidden" name="c" value="blog">
                            <input type="text" name="search" class="form-control" placeholder="Search Posts">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            <!--PAGE-HEADING-END-->

    <!--BLOG-START-->
    <div class="row animated fadeInRight article">
        <br>
        <div class="col-lg-10 col-lg-offset-1">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="pull-right">
                        <button class="btn btn-white btn-xs" type="button"><?php echo $post->getCategoryName(); ?></button>
                    </div>
                    <div class="text-center article-title">
                        <h1 class="blog-h1">
                            <?php echo $post->getTitle(); ?>
                        </h1>
                        <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $post->getDate(); ?></span>&nbsp;&nbsp;
                        <span class="text-muted"><i class="fa fa-pencil-square-o"></i> <?php echo $post->getAuthorName(); ?></span>
                    </div>

                    <?php echo htmlspecialchars_decode($post->getContent()); ?>

                    <hr>

                    <div class="row">
                        <div class="col-lg-12">

                            <h2>Comments:</h2>
                            <div class="social-feed-box">
                                <div class="social-avatar">
                                    <a href="" class="pull-left">
                                        <img alt="image" src="img/a1.jpg">
                                    </a>
                                    <div class="media-body">
                                        <a href="#">
                                            Andrew Williams
                                        </a>
                                        <small class="text-muted">Today 4:21 pm - 12.06.2014</small>
                                    </div>
                                </div>
                                <div class="social-body">
                                    <p>
                                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                        default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                        default model text.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--BLOG-END-->

<?php require_once __DIR__.'/../include/footer.php'?>