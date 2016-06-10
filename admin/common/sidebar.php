    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                            <span>
                                <img style="width: 50px; height: 50px" alt="image" class="img-circle" src="https://scontent.fsof2-1.fna.fbcdn.net/v/t1.0-1/p160x160/13179103_1303381229675272_6215573153915636480_n.jpg?oh=83ef3487fbae0b5d5732c41d16f8d853&oe=57CCE71A" />
                            </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Georgi Dobrishinov</strong>
                             </span> <span class="text-muted text-xs block">Master Admin Root <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="#">View website</a></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        Do.IT
                    </div>
                </li>

                <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

                <li class="<?php echo ($activePage == 'index')? 'active' : ''; ?>">
                    <a href="index.php"><i class="fa fa-desktop"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li class="<?php echo ($activePage == 'categoriesListing')? 'active' : ''; ?>">
                    <a href="categoriesListing.php"><i class="fa fa-tags"></i> <span class="nav-label">Categories</span> </a>
                </li>
                <li class="<?php echo ($activePage == 'projectsListing')? 'active' : ''; ?>">
                    <a href="projectsListing.php"><i class="fa fa-flask"></i> <span class="nav-label">Projects</span> </a>
                </li>
                <li class="<?php echo ($activePage == 'postsListing')? 'active' : ''; ?>">
                    <a href="postsListing.php"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Blog</span> </a>
                </li>
                <li class="<?php echo ($activePage == 'usersListing')? 'active' : ''; ?>">
                    <a href="usersListing.php"><i class="fa fa-users"></i> <span class="nav-label">Users</span> </a>
                </li>
                <li class="<?php echo ($activePage == 'adminsListing')? 'active' : ''; ?>">
                    <a href="adminsListing.php"><i class="fa fa-beer"></i> <span class="nav-label">Admins</span> </a>
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