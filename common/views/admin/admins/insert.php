<?php require_once __DIR__.'/../../../../admin/common/header.php' ?>
<?php require_once __DIR__.'/../../../../admin/common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create Admin</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li>
                    <a href="index.php?c=admins">Admins</a>
                </li>
                <li class="active">
                    <strong>Create Admin</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInDown">
        <div class="row">
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

<?php require_once __DIR__.'/../../../../admin/common/footer.php' ?>