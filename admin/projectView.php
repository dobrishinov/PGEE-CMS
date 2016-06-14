<?php require_once 'common/header.php' ?>

<?php
if (!isset($_GET['id'])) {
    header('Location: projectsListing.php');
}

$projectsCollection = new ProjectsCollection();
$project = $projectsCollection->getOne($_GET['id']);

if (empty($project)) {
    header('Location: projectsListing.php');
}

?>

<?php require_once 'common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Project View</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li>
                    <a href="projectsListing.php">Projects</a>
                </li>
                <li class="active">
                    <strong>Project View</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInDown">

                <div class="mail-box-header">
                    <div class="pull-right tooltip-demo">
                        <a href="projectEdit.php?id=<?php echo $project->getId(); ?>" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Project"><i class="fa fa-edit"></i> Edit</a>
                    </div>
                    <h2>
                        <?php echo $project->getTitle(); ?>
                    </h2>
                    <div class="mail-tools tooltip-demo m-t-md">


                        <h3>
                            <span class="font-noraml"> <?php echo $project->getDescription(); ?> </span>
                        </h3>
                        <br>
                        <h5>
                            <span class="pull-right font-noraml"><i class="fa fa-clock-o"></i> <?php echo $project->getDate(); ?> </span>
                            <span class="font-noraml"><i class="fa fa-pencil-square-o"></i> Author: </span> <?php echo $project->getAuthorName(); ?>
                        </h5>
                    </div>
                </div>
                <div class="mail-box">


                    <div class="mail-body">

                        <?php echo htmlspecialchars_decode($project->getContent()); ?>

                    </div>
                    <div class="mail-body text-left tooltip-demo">
                        <h5>Category:</h5>
                        <button class="btn btn-primary btn-xs" type="button">Electronics</button>
                    </div>
                    <div class="clearfix"></div>



        </div>
    </div>

<?php require_once 'common/footer.php' ?>