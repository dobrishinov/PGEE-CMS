<?php require_once 'common/header.php' ?>

<?php
if (!isset($_GET['id'])) {
    header('Location: usersListing.php');
}

$usersCollection = new UsersCollection();
$user = $usersCollection->getOne($_GET['id']);

if (empty($user)) {
    header('Location: usersListing.php');
}

$data = array(
    'id' => $user->getId(),
    'username' => $user->getUsername(),
    //'password' => $user->getPassword(),
    'fullName' => $user->getFullName(),
    'interests' => $user->getInterests(),
    'phone' => $user->getPhone(),
    'email' => $user->getEmail(),
    'address' => $user->getAddress(),
);

$errors = array();
if (isset($_POST['submit'])) {
    if(strlen(trim($_POST['username'])) < 3 || strlen(trim($_POST['username'])) > 255) {
        $errors['username'] = 'Invalid username length (3 symbols required)';
    }
//    if(strlen(trim($_POST['password'])) < 8 || strlen(trim($_POST['password'])) > 255) {
//        $errors['password'] = 'Invalid password length (8 symbols required)';
//    }
    if(strlen(trim($_POST['fullName'])) < 3 || strlen(trim($_POST['fullName'])) > 255) {
        $errors['fullName'] = 'Invalid full name length';
    }
    if(strlen(trim($_POST['interests'])) < 3 || strlen(trim($_POST['interests'])) > 255) {
        $errors['interests'] = 'Invalid interests length';
    }
    if(strlen(trim($_POST['phone'])) < 3 || strlen(trim($_POST['phone'])) > 255) {
        $errors['phone'] = 'Invalid phone length';
    }
    if(strlen(trim($_POST['email'])) < 3 || strlen(trim($_POST['email'])) > 255) {
        $errors['email'] = 'Invalid email length';
    }
    if(strlen(trim($_POST['address'])) < 3 || strlen(trim($_POST['address'])) > 255) {
        $errors['address'] = 'Invalid address length';
    }

    $data = array(
        'id'       => $_GET['id'],
        'username' => htmlspecialchars(trim($_POST['username'])),
        //'password' => htmlspecialchars(sha1(trim($_POST['password']))),
        'fullName' => htmlspecialchars(trim($_POST['fullName'])),
        'interests' => htmlspecialchars(trim($_POST['interests'])),
        'phone' => htmlspecialchars(trim($_POST['phone'])),
        'email' => htmlspecialchars(trim($_POST['email'])),
        'address' => htmlspecialchars(trim($_POST['address'])),
    );

    if (empty($errors)) {

        $entity = new UserEntity();
        $entity->init($data);

        $usersCollection->save($entity);
        header('Location: usersListing.php');
    }
}
?>

<?php require_once 'common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Edit User</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li>
                    <a href="usersListing.php">Users</a>
                </li>
                <li class="active">
                    <strong>Edit User</strong>
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
                            <label class="col-sm-4 control-label">Username</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" placeholder="Nickname">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('username', $errors))? $errors['username'] : ''; ?>
                                </span>
                            </div>
                        </div>

<!--                        <div class="form-group --><?php //echo (array_key_exists('password', $errors))? 'has-error' : ''; ?><!--">-->
<!--                            <label class="col-sm-4 control-label">Password</label>-->
<!--                            <div class="col-sm-5">-->
<!--                                <input type="password" class="form-control" name="password" placeholder="Password">-->
<!--                                <span class="help-block m-b-none">-->
<!--                                    --><?php //echo (array_key_exists('password', $errors))? $errors['password'] : ''; ?>
<!--                                </span>-->
<!--                            </div>-->
<!--                        </div>-->

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

                        <div class="form-group <?php echo (array_key_exists('interests', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-4 control-label">Interests</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="interests" value="<?php echo $data['interests']; ?>" placeholder="Electronics, Hitchhiking, Camping">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('interests', $errors))? $errors['interests'] : ''; ?>
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
                                <input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>" placeholder="Email address">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('email', $errors))? $errors['email'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group <?php echo (array_key_exists('address', $errors))? 'has-error' : ''; ?>"><label class="col-sm-4 control-label">Address</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="address" value="<?php echo $data['address']; ?>" placeholder="Email address">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('address', $errors))? $errors['address'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-5">
                                <button class="btn btn-primary" type="submit" name="submit">Save user</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'common/footer.php' ?>