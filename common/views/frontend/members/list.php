<?php require_once __DIR__.'/../include/header.php'?>
<?php require_once __DIR__.'/../include/nav.php'?>

<!--CONTENT-START-->
<div class="wrapper">
    <div class="container">
        <!--PAGE-HEADING-START-->
        <div class="row wrapper border-bottom white-bg page-heading animated fadeInDown">
            <div class="col-lg-10">
                <h2>Мembers</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a>Members</a>
                    </li>
                </ol>
            </div>
        </div>
        <!--PAGE-HEADING-END-->
        <br>
        <!--PROFILE-START-->
        <div class="ibox-content animated fadeInRight">
            <div class="row">

                <?php foreach ($members as $member):?>
                <div class="col-lg-4">
                    <div class="contact-box">
                        <a>
                            <div class="col-sm-4">
                                <div class="text-center">
                                    <img alt="image" class="img-circle m-t-xs img-responsive" src="<?php echo $member->getAvatar();?>">
                                    <div class="m-t-xs font-bold"></div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h3><strong><?php echo $member->getFullName();?></strong></h3>
                                <address>
                                    <?php echo $member->getInformation();?>
                                </address>
                                <hr>
                                <p>&nbsp;<i class="fa fa-mobile-phone"></i>&nbsp;&nbsp;<?php echo $member->getPhone();?></p>
                                <p><i class="fa fa-envelope-o"></i> <?php echo $member->getEmail();?></p>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
        <!--PROFILE-END-->
    </div>
</div>
<!--CONTENT-END-->

<?php require_once __DIR__.'/../include/footer.php'?>