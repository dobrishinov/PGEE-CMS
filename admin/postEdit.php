<?php require_once 'common/header.php' ?>

<?php
if (!isset($_GET['id'])) {
    header('Location: postsListing.php');
}

$postsCollection = new PostsCollection();
$post = $postsCollection->getOne($_GET['id']);

$categoriesCollection = new CategoriesCollection();
$categories = $categoriesCollection->get($_GET['id'], NULL, NULL, NULL, NULL, NULL);

$authorCollection = new AdminsCollection();
$authors = $authorCollection->get($_GET['id'], NULL, NULL, NULL, NULL, NULL);


if (empty($post)) {
    header('Location: postsListing.php');
}

$data = array(
    'id'             => $post->getId(),
    'title'          => $post->getTitle(),
    'description'    => $post->getDescription(),
    'categoryName'    => $post->getCategoryName(),
    'authorName'      => $post->getAuthorName(),
    'date'           => $post->getDate(),
    'content'        => htmlspecialchars_decode($post->getContent()),
);

$errors = array();
if (isset($_POST['submit'])) {
    if(strlen(trim($_POST['title'])) < 3 || strlen(trim($_POST['title'])) > 255) {
        $errors['title'] = 'Invalid title length (3 symbols required)';
    }
    if(strlen(trim($_POST['description'])) < 8 || strlen(trim($_POST['description'])) > 255) {
        $errors['description'] = 'Invalid description length (8 symbols required)';
    }
    if(strlen(trim($_POST['categoryName'])) == 0) {
        $errors['categoryName'] = 'Invalid category';
    }
    if(strlen(trim($_POST['authorName'])) == 0) {
        $errors['authorName'] = 'Invalid author';
    }
    if(strlen(trim($_POST['date'])) == 0) {
        $errors['date'] = 'Invalid date';
    }
    if(strlen(trim($_POST['content'])) < 15) {
        $errors['content'] = '<h1 style="text-align: center;"><b style="font-size: larger; color: red;">Invalid content length</b></h1>';
    }
    
    $data = array(
        'id'            => htmlspecialchars(trim($_GET['id'])),
        'title'         => htmlspecialchars(trim($_POST['title'])),
        'description'   => htmlspecialchars(trim($_POST['description'])),
        'categoryName'   => htmlspecialchars(trim($_POST['categoryName'])),
        'authorName'     => htmlspecialchars(trim($_POST['authorName'])),
        'date'          => htmlspecialchars(trim($_POST['date'])),
        'content'       => htmlspecialchars(trim($_POST['content'])),
    );

    if (empty($errors)) {
        $entity = new PostEntity();
        $entity->init($data);


        $postsCollection->save($entity);

        header('Location: postsListing.php');
    }
}
?>

<?php require_once 'common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Edit Post</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li>
                    <a href="postsListing.php">Blog</a>
                </li>
                <li class="active">
                    <strong>Edit Post</strong>
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

                        <div class="form-group <?php echo (array_key_exists('categoryName', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Category:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="categoryName" id="category">
                                    <option value="">Select Category</option>
                                    <?php foreach($categories as $category) { ?>
                                        <option value="<?php echo  $category->getId(); ?>">
                                            <?php echo $category->getName(); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('categoryName', $errors))? $errors['categoryName'] : ''; ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group <?php echo (array_key_exists('authorName', $errors))? 'has-error' : ''; ?>">
                            <label class="col-sm-2 control-label">Author:</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="authorName" id="author">
                                    <option value="">Select Author</option>
                                    <?php foreach($authors as $author) { ?>
                                        <option value="<?php echo  $author->getId(); ?>">
                                            <?php echo $author->getUsername(); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <span class="help-block m-b-none">
                                    <?php echo (array_key_exists('authorName', $errors))? $errors['authorName'] : ''; ?>
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

                <hr class="hr-line-dashed">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Saved Images
                    </div>

                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"> Delete</i></a>
                                </div>
                                <div class="panel-body">
                                    <img style="width:250px; height:220px; margin-left: auto; margin-right: auto;" class="img-responsive" src="https://scontent.fsof2-1.fna.fbcdn.net/v/t1.0-1/p160x160/13179103_1303381229675272_6215573153915636480_n.jpg?oh=83ef3487fbae0b5d5732c41d16f8d853&oe=57CCE71A" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"> Delete</i></a>
                                </div>
                                <div class="panel-body">
                                    <img style="width:250px; height:220px; margin-left: auto; margin-right: auto" class="img-responsive" src="https://scontent.fsof2-1.fna.fbcdn.net/v/t1.0-1/p160x160/13179103_1303381229675272_6215573153915636480_n.jpg?oh=83ef3487fbae0b5d5732c41d16f8d853&oe=57CCE71A" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"> Delete</i></a>
                                </div>
                                <div class="panel-body">
                                    <img style="width:250px; height:220px; margin-left: auto; margin-right: auto" class="img-responsive" src="https://scontent.fsof2-1.fna.fbcdn.net/v/t1.0-1/p160x160/13179103_1303381229675272_6215573153915636480_n.jpg?oh=83ef3487fbae0b5d5732c41d16f8d853&oe=57CCE71A" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <br><br>
    </div>

<?php require_once 'common/footer.php' ?>