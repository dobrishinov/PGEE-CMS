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
            <div class="row animated fadeInRight">

                <br>

                <div class="col-md-9">


                    <?php foreach ($posts as $post): ?>
                    <div class="ibox-content">
                        <div class="col-md-10">
                            <a href="index.php?c=blog&m=show&id=<?php echo $post->getId(); ?>" class="btn-link">
                                <h2>
                                    <?php echo $post->getTitle(); ?>
                                </h2>
                            </a>

                            <div class="small m-b-xs">
                                <strong>
                                    <?php echo $post->getAuthorName(); ?>
                                </strong>
                                <span class="text-muted">
                                    <i class="fa fa-clock-o"></i>
                                    <?php echo $post->getDate(); ?>
                                </span>
                            </div>
                        </div>
                        <div class="small text-right">
                            <img src="admin/uploads/postsImages/thumbnails/<?php echo $post->getImage();?>" alt="" style="width:80px; height:80px;">
                        </div>
                        <hr>
                        <div class="col-md-10">
                            <p>
                                <?php echo $post->getDescription(); ?>
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <div class="small text-right">
                                    <h5>Categories:</h5>
                                    
                                    <a class="btn btn-primary btn-xs">
                                        <?php echo $post->getCategoryName(); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php endforeach; ?>

                    <div class="text-center ">
                        <div class="list-group">
                            <?php echo $paginator->create(); ?>
                        </div>
                    </div>

                    <br>

                </div>
                <!--BLOG-CATEGORIES-START-->
                <div class="col-md-3">
                    <div class="ibox-content">
                        <h3>Categories</h3>
                        <ul class="list-unstyled file-list">
                            <li>
                                <a href="index.php?c=blog&m=postsByCategory&categoryId=0">
                                    <i class="fa fa-ellipsis-v"></i>&nbsp;&nbsp;All Categories
                                </a>
                            </li>

                            <?php foreach ($categories as $category): ?>
                                <li>
                                    <a href="index.php?c=blog&m=postsByCategory&categoryId=<?php echo $category->getId(); ?>">
                                        <i class="fa fa-bookmark-o"></i>&nbsp;&nbsp;<?php echo $category->getName();?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <br>
                <br>

                <!--BLOG-CATEGORIES-END-->
            </div>
            <!--BLOG-END-->
        </div>
    </div>
    <!--CONTENT-END-->

<?php require_once __DIR__.'/../include/footer.php'?>