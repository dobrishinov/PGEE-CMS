<?php

class SchoolController extends Controller
{
    public function index()
    {
        header('Location: index.php');
    }

    public function show()
    {
        $viewData = array();

        if (!isset($_GET['id'])) {
            header('Location: index.php');
            exit;
        }

        $id = (int)($_GET['id']);

        $schoolCollection = new SchoolCollection();
        $school = $schoolCollection->getOne($id);

        if ($school == null) {
            header('Location: index.php');
            exit;
        }

        $viewData['school'] = $school;

        $this->loadFrontView('school/show.php', $viewData);
    }

    public function schoolByCategory()
    {
        $viewData = array();

        $categoryId = (isset($_GET['categoryId']))? (int)$_GET['categoryId'] : 0;

        $categoriesCollection = new CategoriesCollection();
        $categories = $categoriesCollection->get(1, null, null, null, null, null);

        $schoolCollection = new SchoolCollection();

        $where = array();
        if ($categoryId != 0) {
            $where = array(
                'category_id' => $categoryId
            );
        }


        //В тази променлива пазим броя резултати които искаме да върне заявката
        $pageResults = 5;

        //В променливата $page присвояваме гет параметъра, който се придава. Ако няма гет параметър то тогава слагаме 1.
        $page = (isset($_GET['page']) && (int)$_GET['page'] > 0)? (int)$_GET['page'] : 1;

        //В тази променлива изчисляваме от кой точно резултат да започне броенето в заявката.
        $offset = ($page-1)*$pageResults;

        $school = $schoolCollection->get($where, $offset, $pageResults, null, array('date', 'DESC'), 'name');

        $totalRows = count($schoolCollection->get(array(), -1, 0, null, array('date', 'DESC'), 'name'));
        $totalRows = ($totalRows == 0)? 1 : $totalRows;

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl('index.php?c=school&m=schoolByCategory&categoryId='.$categoryId);

        $viewData['paginator'] = $paginator;
        $viewData['school'] = $school;
        $viewData['categories'] = $categories;

        $this->loadFrontView('school/list.php', $viewData);
    }
}