<?php
require_once('common/header.php');
?>

<?php

//$adminsCollection = new AdminsCollection();
////$admins = $admins->get(array(), -1, 0, null, null, 'username');
//
//$errors = array();
//if (isset($_POST['submit'])) {
//    if (strlen($_POST['username']) < 5 || strlen($_POST['username']) > 50) {
//        $errors['credential'] = 'Wrong credentials';
//    }
//
//    if (strlen($_POST['password']) < 5  || strlen($_POST['password']) > 50) {
//        $errors['credential'] = 'Wrong credentials';
//    }
//
//    if (empty($errors)) {
//        $admins = $adminsCollection->getName($_POST['username']);
//
//        if (!empty($admins)) {
//
//            if ($admins->getPassword() == sha1($_POST['password'])) {
//                $_SESSION['logged_in'] = 1;
//                $_SESSION['admins'] = $admins;
//                header('Location: index.php');
//            } else {
//                $errors[] = 'Wrong credentials';
//            }
//        } else {
//            $errors[] = 'Wrong credentials';
//        }
//    }
//
//}

?>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">Do.IT</h1>

            </div>
            <h3>Welcome to Do.IT+</h3>
            <p></p>
            <p>Login in. To see it in action.</p>

            <?php
            foreach ($errors as $error) {
                echo $error."<br/>";
            }
            ?>

            <form class="m-t" role="form" action="" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password" required="">
                </div>
                <button type="submit" name="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="">Create an account</a>
            </form>
            <p class="m-t"> <small>Do.IT &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>