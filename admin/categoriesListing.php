<?php require_once 'common/header.php' ?>

<?php

$search = (isset($_GET['search'])) ? htmlspecialchars(trim($_GET['search'])) : '';

$categoriesCollection = new CategoriesCollection();

//В тази променлива пазим броя резултати които искаме да върне заявката
$pageResults = (isset($_GET['perPage'])) ? (int)$_GET['perPage'] : 0;
switch ($pageResults) {
    case 1:
        $pageResults = 1;
        break;
    case 5:
        $pageResults = 5;
        break;
    case 10:
        $pageResults = 10;
        break;
    default:
        $pageResults = 5;
}

//Филтър за подреждане по
$orderBy = (isset($_GET['orderBy'])) ? (int)$_GET['orderBy'] : 0;
switch ($orderBy) {
    case 1:
        $order = array('id', 'DESC');
        break;
    case 2:
        $order = array('id', 'ASC');
        break;
    case 3:
        $order = array('name', 'ASC');
        break;
    case 4:
        $order = array('name', 'DESC');
        break;
    default:
        $order = array('id', 'DESC');
}

//В променливата $page присвояваме гет параметъра, който се придава. Ако няма гет параметър то тогава слагаме 1.
$page = (isset($_GET['page']) && (int)$_GET['page'] > 0)? (int)$_GET['page'] : 1;

//В тази променлива изчисляваме от кой точно резултат да започне броенето в заявката.
$offset = ($page-1)*$pageResults;

$categories = $categoriesCollection->get(array(), $offset, $pageResults, $search, $order, $column='name');

$totalRows = count($categoriesCollection->get(array(), -1, 0, $search, $order, $column='name'));
$totalRows = ($totalRows == 0)? 1 : $totalRows;

$paginator = new Pagination();
$paginator->setPerPage($pageResults);
$paginator->setTotalRows($totalRows);
$paginator->setBaseUrl("categoriesListing.php?perPage={$pageResults}&orderBy={$orderBy}&search={$search}");
?>

<?php require_once 'common/sidebar.php' ?>

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Categories</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.php">Admin</a>
                </li>
                <li class="active">
                    <strong>Categories</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInDown">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">

                    <form action="" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" value="<?php echo $search; ?>" placeholder="Search Categories">
                                    <span class="input-group-btn">
                                       <input type="submit" class="btn btn-primary" value="Go">
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <select class="form-control" name="orderBy" id="orderBy">
                                    <option value="1" <?php echo ($orderBy == 1)? 'selected': ''; ?>>Newest</option>
                                    <option value="2" <?php echo ($orderBy == 2)? 'selected': ''; ?>>Older</option>
                                    <option value="3" <?php echo ($orderBy == 3)? 'selected': ''; ?>>Username ascending</option>
                                    <option value="4" <?php echo ($orderBy == 4)? 'selected': ''; ?>>Username descending</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <select class="form-control" name="perPage" id="perPage">
                                    <option value="1" <?php echo  ($pageResults == 1)? 'selected' : ''; ?>>1</option>
                                    <option value="5" <?php echo  ($pageResults == 5)? 'selected' : ''; ?>>5</option>
                                    <option value="10" <?php echo  ($pageResults == 10)? 'selected' : ''; ?>>10</option>
                                </select>
                            </div>

                            <div class="col-md-2 col-md-offset-1">
                                <a href="categoryCreate.php" class="btn btn-primary btn">New Category</a>
                            </div>

                        </div>

                    </form>

                    <br>

                </div>
                <div class="ibox-content">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($categories as $category) { ?>
                            <tr>
                                <td class="col-md-5"><?php echo $category->getName(); ?></td>
                                <td class="col-md-5"><?php echo $category->getDescription(); ?></td>
                                <td class="col-md-2">
                                    <a href="categoryEdit.php?id=<?php echo $category->getId();?>" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="categoryDelete.php?id=<?php echo $category->getId();?>" class="btn btn-white btn-sm"><i class="fa fa-trash"></i> Delete </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                    <div class="text-center">
                        <?php echo $paginator->create(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php require_once 'common/footer.php' ?>