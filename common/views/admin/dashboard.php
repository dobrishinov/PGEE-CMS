<?php require_once __DIR__.'/../../../admin/common/header.php' ?>
<?php require_once __DIR__.'/../../../admin/common/sidebar.php' ?>

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
                        <h5><i class="fa fa-graduation-cap"></i> School</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $school ?></h1>
                        <div class="stat-percent font-bold"><a class="text-navy" href="index.php?c=projects">View all</a></div>
                        <small>Total School posts</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><i class="fa fa-flask"></i> Projects</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $projects; ?></h1>
                        <div class="stat-percent font-bold"><a class="text-navy" href="index.php?c=projects">View all</a></div>
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
                        <h1 class="no-margins"><?php echo $posts;?></h1>
                        <div class="stat-percent font-bold text-navy"><a class="text-navy" href="index.php?c=posts">View all</a></div>
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
                        <h1 class="no-margins"><?php echo $categories; ?></h1>
                        <div class="stat-percent font-bold text-navy"><a class="text-navy" href="index.php?c=categories">View all</a></div>
                        <small>Total categories</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><i class="fa fa-users"></i> Admins</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo $admins?></h1>
                        <div class="stat-percent font-bold text-danger"><a class="text-navy" href="index.php?c=users">View all</a></div>
                        <small>Total Admins</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once __DIR__.'/../../../admin/common/footer.php' ?>