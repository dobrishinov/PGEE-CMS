<?php require_once __DIR__.'/../../../../admin/common/header.php' ?>
<?php require_once __DIR__.'/../../../../admin/common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Project View</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li>
                    <a href="index.php?c=projects">Projects</a>
                </li>
                <li class="active">
                    <strong>Project View</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInDown">
        <div class="ibox">
            <div class="ibox-content">
                <div class="pull-right tooltip-demo">
                    <a href="index.php?c=projects&m=update&id=<?php echo $projects->getId(); ?>" class="btn btn-white btn-xs" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Projects"><i class="fa fa-pencil"></i> Edit</a>
                </div>
                <div class="text-center article-title">
                    <h1 class="blog-h1">
                        <?php echo $projects->getTitle(); ?>
                    </h1>
                    <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $projects->getDate(); ?> </span>&nbsp;
                    <span class="text-muted"><i class="fa fa-pencil-square-o"></i> <?php echo $projects->getAuthorName(); ?> </span>
                </div>

                <?php echo htmlspecialchars_decode($projects->getContent()); ?>

                <br>
                <br>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Category:</h5>
                        <button class="btn btn-primary btn-xs" type="button"><?php echo $projects->getCategoryName(); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once __DIR__.'/../../../../admin/common/footer.php' ?>