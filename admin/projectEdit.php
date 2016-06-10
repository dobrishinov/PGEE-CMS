<?php require_once 'common/header.php' ?>
<?php require_once 'common/sidebar.php' ?>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Project</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Admin</a>
            </li>
            <li>
                <a href="projectsListing.php">Projects</a>
            </li>
            <li class="active">
                <strong>Edit Project</strong>
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