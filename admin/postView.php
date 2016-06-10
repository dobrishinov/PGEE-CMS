<?php require_once 'common/header.php' ?>

<?php
if (!isset($_GET['id'])) {
    header('Location: postsListing.php');
}

$postsCollection = new PostsCollection();
$post = $postsCollection->getOne($_GET['id']);

if (empty($post)) {
    header('Location: postsListing.php');
}

?>

<?php require_once 'common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Post View</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li>
                    <a href="postsListing.php">Blog</a>
                </li>
                <li class="active">
                    <strong>Post View</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInDown">
        <div class="ibox">
            <div class="ibox-content">
                <div class="pull-right tooltip-demo">
                    <a href="postEdit.php?id=<?php echo $post->getId(); ?>" class="btn btn-white btn-xs" type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Post"><i class="fa fa-pencil"></i> Edit</a>
                </div>
                <div class="text-center article-title">
                    <h1 class="blog-h1">
                        <?php echo $post->getTitle(); ?>
                    </h1>
                    <span class="text-muted"><i class="fa fa-clock-o"></i> <?php echo $post->getDate(); ?> </span>&nbsp;
                    <span class="text-muted"><i class="fa fa-pencil-square-o"></i> <?php echo $post->getAuthorName(); ?> </span>
                </div>

                <?php echo htmlspecialchars_decode($post->getContent()); ?>

                <br>
                <br>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Category:</h5>
                        <button class="btn btn-primary btn-xs" type="button"><?php echo $post->getCategoryName(); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'common/footer.php' ?>