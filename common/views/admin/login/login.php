<?php require_once __DIR__.'/../../../../admin/common/header.php' ?>

    <body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">PGEE</h1>

        </div>
        <h3>Admin Panel Login</h3>

        <?php
        foreach ($errors as $error) {
            echo $error."<br/>";
        }
        ?>

        <form class="m-t" role="form" action="" method="post">
            <div class="input-group m-b">
                <span class="input-group-addon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
                <input type="text" class="form-control" name="username" placeholder="Username" required="">
            </div>
            <div class="input-group m-b">
                <span class="input-group-addon">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
                <input type="password" class="form-control" name="password" placeholder="Password" required="">
            </div>
            <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>
        </form>
        <p class="m-t"> <small>PGEE Plovdiv - <a href="http://dobrishinov.6tai.ga">Do.IT CMS</a> &copy; 2016</small> </p>
    </div>
</div>

<?php require_once __DIR__.'/../../../../admin/common/header.php' ?>
