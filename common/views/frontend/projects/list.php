<?php require_once __DIR__.'/../include/header.php'?>
<?php require_once __DIR__.'/../include/nav.php'?>

    <!--CONTENT-START-->
    <div class="wrapper">
        <div class="container">
            <!--PAGE-HEADING-START-->
            <div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
                <div class="col-lg-8">
                    <h2>Projects</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="index.php?c=projects">Projects</a>
                        </li>
                    </ol>
                </div>
                <br>
                <div class="col-lg-4">
                    <form class="navbar-form navbar-left" role="search" action="" method="get">
                        <div class="form-group">
                            <input type="hidden" name="c" value="projects">
                            <input type="text" name="search" class="form-control" placeholder="Search Projects">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
            <!--PAGE-HEADING-END-->

            <!--PROJECTS-CATEGORIES-START-->
            <div class="row animated fadeInRight">
                <br>
                <div class="ibox-content">
                    <h2>Categories</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="m-t text-righ">
                                <a href="index.php?c=projects&m=projectsByCategory&categoryId=0" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-tag"></i>&nbsp;&nbsp;All Categories
                                </a>
                                <?php foreach ($categories as $category): ?>
                                <a href="index.php?c=projects&m=projectsByCategory&categoryId=<?php echo $category->getId(); ?>" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-tag"></i>&nbsp;&nbsp;<?php echo $category->getName();?>
                                </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--PROJECTS-CATEGORIES-END-->

            <br>

            <!--LATEST-PROJECTS-START-->
            <div class="ibox-content animated fadeInRight">
                <h2>Projects</h2>
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

                </div>
            </div>
            <!--LATEST-PROJECTS-END-->

            <div class="text-center ">
                <div class="list-group">
                    <?php echo $paginator->create(); ?>
                </div>
            </div>

            <br>
        </div>
    </div>

    <!--CONTENT-END-->

<?php require_once __DIR__.'/../include/footer.php'?>