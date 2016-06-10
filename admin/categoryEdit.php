<?php require_once 'common/header.php' ?>

<?php
if (!isset($_GET['id'])) {
    header('Location: categoriesListing.php');
}

$categoriesCollection = new CategoriesCollection();
$category = $categoriesCollection->getOne($_GET['id']);

if (empty($category)) {
    header('Location: categoriesListing.php');
}

$data = array(
    'id' => $category->getId(),
    'name' => $category->getName(),
    'description' => $category->getDescription(),
);
?>

<?php
$errors = array();

if (isset($_POST['submit'])) {
    $data = array(
        
        'name' => $_POST['name'],
        'description' => $_POST['description'],
    );

    if(strlen(trim($_POST['name'])) < 3 || strlen(trim($_POST['name'])) > 255) {
        $errors['name'] = 'Invalid category name length';
    }
    if(strlen(trim($_POST['description'])) < 3 || strlen(trim($_POST['description'])) > 500) {
        $errors['description'] = 'Invalid category description length';
    }

    $data = array(
        'id'       => $_GET['id'],
        'name' => htmlspecialchars(trim($_POST['name'])),
        'description' => htmlspecialchars(trim($_POST['description'])),
    );

    if (empty($errors)) {
        $entity = new CategoryEntity();
        $entity->init($data);
        
        $categoriesCollection->save($entity);

        header('Location: categoriesListing.php');
    }

}
?>

<?php require_once 'common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Edit category</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li>
                    <a href="categoriesListing.php">Categories</a>
                </li>
                <li class="active">
                    <strong>Edit Category</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInDown">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox-title">

                    <form method="post" class="form-horizontal">

                        <div class="form-group <?php echo (array_key_exists('name', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-4 control-label">Category name</label>
                            <div class="col-sm-5">
                                <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>" placeholder="Enter name for category">
                                    <span class="help-block m-b-none">
                                        <?php echo (array_key_exists('name', $errors))? $errors['name'] : ''; ?>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group <?php echo (array_key_exists('description', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-4 control-label">Description</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="description" rows="4" cols="46" placeholder="Enter some description for category"><?php echo $data['description']; ?></textarea>
                                    <span class="help-block m-b-none">
                                        <?php echo (array_key_exists('description', $errors))? $errors['description'] : ''; ?>
                                    </span>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-5">
                                <button class="btn btn-primary" type="submit" name="submit">Save category</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

<?php require_once 'common/footer.php' ?>