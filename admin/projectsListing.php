<?php require_once 'common/header.php' ?>
<?php require_once 'common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Projects</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li class="active">
                    <strong>Projects</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInDown">
        <div class="ibox">
            <div class="ibox-title">
                <div class="col-xs-6">
                    <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-sm btn-primary"> Go!</button>
                        </span>
                    </div>
                </div>
                <div class="ibox-tools">
                    <a href="projectCreate.php" class="btn btn-primary btn">Create new Project</a>
                </div>
            </div>
            <div class="ibox-content">

                <div class="project-list">

                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td class="project-status">
                                <span class="label label-primary">Active</span>
                            </td>
                            <td class="col-md-3">
                                <a href="project_detail.html">Contract with Zender Company</a>
                                <br>
                                <small>Created 14.08.2014</small>
                            </td>
                            <td colspan="2" class="col-md-5">
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aut culpa doloribus eaque eius hic id incidunt ipsum maxime molestias non odio possimus, provident repudiandae sequi, sit, soluta unde ut.
                            </td>
                            <td class="project-actions">
                                <a href="projectView.php" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> View </a>
                                <a href="projectEdit.php" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="projectDelete.php" class="btn btn-white btn-sm"><i class="fa fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="project-status">
                                <span class="label label-primary">Active</span>
                            </td>
                            <td class="col-md-3">
                                <a href="project_detail.html">Contract with Zender Company</a>
                                <br>
                                <small>Created 14.08.2014</small>
                            </td>
                            <td colspan="2" class="col-md-5">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam aut culpa doloribus eaque eius hic id incidunt ipsum maxime molestias non odio possimus, provident repudiandae sequi, sit, soluta unde ut.
                            </td>
                            <td class="project-actions">
                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-eye"></i> View </a>
                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-trash"></i> Delete </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div class="text-center">
                        <nav>
                            <ul class="pagination">
                                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                                <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once 'common/footer.php' ?>