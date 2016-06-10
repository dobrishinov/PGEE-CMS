<?php require_once 'common/header.php' ?>
<?php require_once 'common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Add Project</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li>
                    <a href="projectsListing.php">Projects</a>
                </li>
                <li class="active">
                    <strong>Add Project</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInDown">
        <div class="ibox-title">
            <div class="panel-body">

                <fieldset class="form-horizontal">
                    <form action="" method="get">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Project Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="My Project">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Project Description:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Some text for description">
                            </div>
                        </div>
                        <hr class="hr-line-dashed">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea class="summernote" name="summernote" id="summernote" rows="10" cols="30"></textarea>
                            </div>
                        </div>
                        <hr class="hr-line-dashed">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Category:</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Author:</label>
                            <div class="col-sm-10">
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Create Date:</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" placeholder="Date">
                            </div>
                        </div>
                        <hr class="hr-line-dashed">
                        <input class="btn btn-primary pull-right" type="submit" value="Save Project">
                    </form>
                </fieldset>

            </div>
        </div>
        <br><br>
    </div>

<?php require_once 'common/footer.php' ?>