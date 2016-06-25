    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <span>
                                <img style="width: 50px; height: 50px" alt="image" class="img-circle" src="<?php echo $_SESSION['user']->getAvatar(); ?>" />
                            </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">
                                        <?php echo $_SESSION['user']->getFullName(); ?>
                                    </strong>
                                </span>
                                <span class="text-muted text-xs block">
                                    <?php echo $_SESSION['user']->getInformation(); ?>
                                    <b class="caret"></b>
                                </span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="../">View website</a></li>
                            <li><a href="index.php?c=login&m=logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        Do.IT
                    </div>
                </li>

                <?php $activePage = basename($_SERVER['REQUEST_URI']); ?>

                <li class="<?php echo ($activePage == 'index.php')? 'active' : ''; ?>">
                    <a href="index.php"><i class="fa fa-desktop"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li class="<?php echo ($activePage == 'index.php?c=categories')? 'active' : ''; ?>">
                    <a href="index.php?c=categories"><i class="fa fa-tags"></i> <span class="nav-label">Categories</span> </a>
                </li>
                <li class="<?php echo ($activePage == 'index.php?c=projects')? 'active' : ''; ?>">
                    <a href="index.php?c=projects"><i class="fa fa-flask"></i> <span class="nav-label">Projects</span> </a>
                </li>
                <li class="<?php echo ($activePage == 'index.php?c=posts')? 'active' : ''; ?>">
                    <a href="index.php?c=posts"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Blog</span> </a>
                </li>
                <li class="<?php echo ($activePage == 'index.php?c=users')? 'active' : ''; ?>">
                    <a href="index.php?c=admins"><i class="fa fa-users"></i> <span class="nav-label">Users</span> </a>
                </li>
                <li class="<?php echo ($activePage == 'index.php?c=admins')? 'active' : ''; ?>">
                    <a href="index.php?c=admins"><i class="fa fa-beer"></i> <span class="nav-label">Admins</span> </a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="">
                            <i class="fa fa-clock-o btn btn-primary"> Local time: <span id="clock"></span></i>
                        </a>
                </ul>

            </nav>
        </div>