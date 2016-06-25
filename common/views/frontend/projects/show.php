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
                        <li>
                            <a><?php echo $project->getTitle();?></a>
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

    <!--BLOG-START-->
    <div class="row animated fadeInRight article">
        <br>
            <div class="ibox">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                            <div class="mail-box-header">
                                <div class="pull-right tooltip-demo">
                                    <a href="" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Category"><i class="fa fa-tag"></i> <?php echo $project->getCategoryName(); ?></a>
                                </div>
                                <h2>
                                    <?php echo $project->getTitle(); ?>
                                </h2>
                                <div class="mail-tools tooltip-demo m-t-md">

                                    <h3>
                                        <span class="font-noraml"></span><?php echo $project->getDescription();?>
                                    </h3>
                                    <h5>
                                        <span class="pull-right font-noraml"> <i class="fa fa-clock-o"></i> <?php echo $project->getDate(); ?></span>
                                        <span class="font-noraml">Author <i class="fa fa-pencil-square-o"></i> </span><?php echo $project->getAuthorName();?>
                                    </h5>
                                </div>
                            </div>
                            <div class="mail-box">


                                <div class="mail-body">
                                    <?php echo htmlspecialchars_decode($project->getContent());?>
                                </div>
                                <hr>
                                <div class="clearfix"></div>

                                <div class="social-body">
                                    <div id="disqus_thread"></div>
                                    <script>
                                        /**
                                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
                                         */
                                        /*
                                         var disqus_config = function () {
                                         this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                         this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                         };
                                         */
                                        (function() {  // DON'T EDIT BELOW THIS LINE
                                            var d = document, s = d.createElement('script');

                                            s.src = '//doit6taiga.disqus.com/embed.js';

                                            s.setAttribute('data-timestamp', +new Date());
                                            (d.head || d.body).appendChild(s);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--BLOG-END-->

<?php require_once __DIR__.'/../include/footer.php'?>