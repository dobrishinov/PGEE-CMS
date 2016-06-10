<?php require_once 'common/header.php' ?>

<?php
$db = DB::getInstance();
$categories = $db->get('categories');
$admins = $db->get('admins');
?>

<?php
$data = array(
    'title'          => '',
    'description'    => '',
    'category_id'    => '',
    'author_id'      => '',
    'date'           => '',
    'content'        => '',
    );

$errors = array();
if (isset($_POST['submit'])) {
    if(strlen(trim($_POST['title'])) < 3 || strlen(trim($_POST['title'])) > 255) {
        $errors['title'] = 'Invalid title length (3 symbols required)';
    }
    if(strlen(trim($_POST['description'])) < 8 || strlen(trim($_POST['description'])) > 255) {
        $errors['description'] = 'Invalid description length (8 symbols required)';
    }
    if(strlen(trim($_POST['category_id'])) == 0) {
        $errors['category_id'] = 'Invalid category';
    }
    if(strlen(trim($_POST['author_id'])) == 0) {
        $errors['author_id'] = 'Invalid author';
    }
    if(strlen(trim($_POST['date'])) == 0) {
        $errors['date'] = 'Invalid date';
    }
    if(strlen(trim($_POST['content'])) < 15) {
        $errors['content'] = '<h1 style="text-align: center;"><b style="font-size: larger; color: red;">Invalid content length</b></h1>';
    }

    $data = array(
        'title'         => trim($_POST['title']),
        'description'   => trim($_POST['description']),
        'category_id'   => trim($_POST['category_id']),
        'author_id'     => trim($_POST['author_id']),
        'date'          => trim($_POST['date']),
        'content'       => htmlspecialchars(trim($_POST['content'])),
    );

    if (empty($errors)) {
        $db->insert('posts', $data);
        header('Location: postsListing.php');
    }
}
?>

<?php require_once 'common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Create Post</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li>
                    <a href="postsListing.php">Blogs</a>
                </li>
                <li class="active">
                    <strong>Create Post</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInDown">
        <div class="ibox-title">
            <div class="panel-body">

                <fieldset class="form-horizontal">
                    <form action="" method="post">

                        <div class="form-group <?php echo (array_key_exists('title', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Post Title:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" value="<?php echo $data['title']; ?>" placeholder="My Title">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('title', $errors))? $errors['title'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group <?php echo (array_key_exists('description', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Post Description:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="description" value="<?php echo $data['description']; ?>" placeholder="Some text for description">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('description', $errors))? $errors['description'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group <?php echo (array_key_exists('category_id', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Category:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id" id="category">
                                    <option value="">Select Category</option>
                                    <?php foreach($categories as $category) { ?>
                                        <option value="<?php echo  $category['id']; ?>">
                                            <?php echo $category['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('category_id', $errors))? $errors['category_id'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group <?php echo (array_key_exists('author_id', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Author:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="author_id" id="author">
                                    <option value="">Select Author</option>
                                    <?php foreach($admins as $admin) { ?>
                                        <option value="<?php echo  $admin['id']; ?>">
                                            <?php echo $admin['username']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('author_id', $errors))? $errors['author_id'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group <?php echo (array_key_exists('date', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Create Date:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="date" value="<?php echo $data['date']; ?>" placeholder="Date">
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('date', $errors))? $errors['date'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <hr class="hr-line-dashed">

                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="summernote" name="content" id="summernote" rows="10" cols="30"><?php echo $data['content']; ?><?php echo (array_key_exists('content', $errors))? $errors['content'] : ''; ?></textarea>
                            </div>
                        </div>

                        <hr class="hr-line-dashed">

                        <input class="btn btn-primary pull-right" type="submit" name="submit" value="Save Project">

                    </form>
                </fieldset>

                </div>
        </div>
        <br><br>
    </div>

<?php require_once 'common/footer.php' ?>