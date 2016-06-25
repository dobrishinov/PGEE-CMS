<?php require_once __DIR__.'/../include/header.php'?>
<?php require_once __DIR__.'/../include/nav.php'?>

    <!--CONTENT-START-->
    <div class="wrapper">
        <div class="container">
            <!--PAGE-HEADING-START-->
            <div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
                <div class="col-lg-10">
                    <h2>About</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a>About</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!--PAGE-HEADING-END-->
            <br>
            <!--PROFILE-START-->
            <div class="ibox-content animated fadeInRight">
                <div class="row">
                        <div class="row m-b-lg m-t-lg">
                            <div class="col-md-4">

                                <div class="profile-image">
                                    <img src="https://lh3.googleusercontent.com/-aAQZFbpiRSE/VzH-1QBiU-I/AAAAAAAABUI/O4qMBnJ1yNwfT5LejrWce25MmQR3czPHgCKgB/w140-h140-p/12109239_1175742209105842_6460151055787257569_n.jpg" class="img-circle circle-border m-b-md" alt="profile">
                                </div>
                                <div class="profile-info">
                                    <div class="">
                                        <div>
                                            <h2 class="no-margins">
                                                Georgi Dobrishinov
                                            </h2>
                                            <h4>Founder of Do.IT</h4>
                                            <small>
                                                In a hot and boring day, I decided to create this project with the idea that more people will touch what I do.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-8">
                                <div class="col-lg-4">
                                    <a href="index.php?c=blog">
                                        <div class="widget style1 navy-bg">
                                            <div class="row vertical-align">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-file-text-o fa-3x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <h2 class="font-bold"><?php echo $posts; ?></h2>
                                                </div>
                                            </div>
                                            <span>Articles</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4">
                                    <a href="index.php?c=projects">
                                        <div class="widget style1 navy-bg">
                                            <div class="row vertical-align">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-cubes fa-3x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <h2 class="font-bold"><?php echo $projects; ?></h2>
                                                </div>
                                            </div>
                                            <span>Projects</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4">
                                    <a href="index.php?c=members">
                                        <div class="widget style1 navy-bg">
                                            <div class="row vertical-align">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-support fa-3x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <h2 class="font-bold"><?php echo $admins; ?></h2>
                                                </div>
                                            </div>
                                            <span>Members</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <div class="row">

                        <div class="col-lg-12">

                            <div class="ibox">
                                <div class="ibox-content">
                                    <h3>About Georgi Dobrishinov</h3>

                                    <p class="small">
                                        I have knowledge of PHP, MySQL, web design and photography. Тwo years experience working with Photoshop, HTML5 and CSS3. Skilled at working with Cordova and other hybrid mobile frameworks.  I work as a hobby with embedded systems like Arduino, Tinusaur and other hardware platforms. My interest are aimed in projects connected to creating hardware devices, develop mobile applications and frontend experience. I am addicted to new technologies and I would like to expand my knowledge.
                                    <hr>
                                        SOON update about me...
                                    </p>

                                </div>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
            <!--PROFILE-END-->
        </div>
    </div>
    <!--CONTENT-END-->

<?php require_once __DIR__.'/../include/footer.php'?>