<?php require_once __DIR__.'/../../../../admin/common/header.php' ?>
<?php require_once __DIR__.'/../../../../admin/common/sidebar.php' ?>

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

                        <input class="btn btn-primary pull-right" type="submit" name="submit" value="Save Post">

                    </form>
                </fieldset>

            </div>
        </div>
        <br><br>
    </div>

<?php require_once __DIR__.'/../../../../admin/common/footer.php' ?>