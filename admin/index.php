<?php require_once 'common/header.php' ?>

<?php

$db = DB::getInstance();
$projects = count($db->get('projects'));
$posts = count($db->get('posts'));
$categories = count($db->get('categories'));
$users = count($db->get('users'));

?>

<?php require_once 'common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Dashboard</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li class="active">
                    <strong>Dashboard</strong>
                </li>
            </ol>
        </div>
    </div>

<div class="wrapper wrapper-content animated fadeInDown">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-flask"></i> Projects</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $projects?></h1>
                    <div class="stat-percent font-bold"><a class="text-navy" href="projectsListing.php">View all</a></div>
                    <small>Total projects</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-newspaper-o"></i> Blog Posts</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $posts?></h1>
                    <div class="stat-percent font-bold text-navy"><a class="text-navy" href="postsListing.php">View all</a></div>
                    <small>Total posts</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-tags"></i> Categories</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $categories?></h1>
                    <div class="stat-percent font-bold text-navy"><a class="text-navy" href="categoriesListing.php">View all</a></div>
                    <small>Total categories</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-users"></i> Users</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $users?></h1>
                    <div class="stat-percent font-bold text-danger"><a class="text-navy" href="usersListing.php">View all</a></div>
                    <small>Total Users</small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'common/footer.php' ?>