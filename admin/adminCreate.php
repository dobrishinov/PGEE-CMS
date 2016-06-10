<?php require_once 'common/header.php' ?>

<?php
$data = array(
    'username'    => '',
    'password'    => '',
    'fullName'    => '',
    'information' => '',
    'phone'       => '',
    'email'       => ''
);

$errors = array();
if (isset($_POST['submit'])) {
    if(strlen(trim($_POST['username'])) < 3 || strlen(trim($_POST['username'])) > 255) {
        $errors['username'] = 'Invalid username length (3 symbols required)';
    }
    if(strlen(trim($_POST['password'])) < 8 || strlen(trim($_POST['password'])) > 255) {
        $errors['password'] = 'Invalid password length (8 symbols required)';
    }
    if(strlen(trim($_POST['fullName'])) < 3 || strlen(trim($_POST['fullName'])) > 255) {
        $errors['fullName'] = 'Invalid full name length';
    }
    if(strlen(trim($_POST['information'])) < 3 || strlen(trim($_POST['information'])) > 255) {
        $errors['information'] = 'Invalid information length';
    }
    if(strlen(trim($_POST['phone'])) < 3 || strlen(trim($_POST['phone'])) > 255) {
        $errors['phone'] = 'Invalid phone length';
    }
    if(strlen(trim($_POST['email'])) < 3 || strlen(trim($_POST['email'])) > 255) {
        $errors['email'] = 'Invalid email length';
    }
    $data = array(
        'username' => htmlspecialchars(trim($_POST['username'])),
        'password' => htmlspecialchars(sha1(trim($_POST['password']))),
        'fullName' => htmlspecialchars(trim($_POST['fullName'])),
        'information' => htmlspecialchars(trim($_POST['information'])),
        'phone' => htmlspecialchars(trim($_POST['phone'])),
        'email' => htmlspecialchars(trim($_POST['email'])),
    );

    if (empty($errors)) {
        $entity = new AdminEntity();
        $entity->init($data);
        $adminsCollection = new AdminsCollection();
        $adminsCollection->save($entity);
        
        header('Location: adminsListing.php');
    }
}
?>

<?php require_once 'common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create Admin</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li>
                    <a href="adminsListing.php">Admins</a>
                </li>
                <li class="active">
                    <strong>Create Admin</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInDown">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox-title">
                    <form method="post" class="form-horizontal">

                        <div class="form-group <?php echo (array_key_exists('username', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-4 control-label">Admin Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" placeholder="Nickname">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('username', $errors))? $errors['username'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group <?php echo (array_key_exists('password', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-4 control-label">Password</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('password', $errors))? $errors['password'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <hr class="hr-line-dashed">

                        <div class="form-group <?php echo (array_key_exists('fullName', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-4 control-label">Full Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="fullName" value="<?php echo $data['fullName']; ?>"  placeholder="First name, last name">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('fullName', $errors))? $errors['fullName'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group <?php echo (array_key_exists('information', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-4 control-label">Information</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="information" value="<?php echo $data['information']; ?>" placeholder="Some information">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('information', $errors))? $errors['information'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group <?php echo (array_key_exists('phone', $errors))? 'has-error' : ''; ?>"><label class="col-sm-4 control-label">Phone</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="phone" value="<?php echo $data['phone']; ?>" placeholder="Phone number">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('phone', $errors))? $errors['phone'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group <?php echo (array_key_exists('email', $errors))? 'has-error' : ''; ?>"><label class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>" placeholder="Email address">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('email', $errors))? $errors['email'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-5">
                                <button class="btn btn-primary" type="submit" name="submit">Save admin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'common/footer.php' ?>