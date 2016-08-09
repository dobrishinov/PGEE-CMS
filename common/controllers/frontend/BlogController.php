<?php

class BlogController extends Controller
{
    public function index()
    {
        $viewData = array();

        $postsCollection = new PostsCollection();
        $posts = $postsCollection->get(array(), null, null, null, array('date', 'DESC'), 'title');

        $viewData['posts'] = $posts;

        $this->loadFrontView('blog/list.php', $viewData);
    }

    public function show()
    {
        $viewData = array();

        if (!isset($_GET['id'])) {
            header('Location: index.php');
            exit;
        }

        $id = (int)($_GET['id']);

        $PostsCollection = new PostsCollection();
        $post = $PostsCollection->getOne($id);

        if ($post == null) {
            header('Location: index.php');
            exit;
        }

        $viewData['post'] = $post;

        $this->loadFrontView('blog/show.php', $viewData);
    }

    public function postsByCategory()
    {
        $viewData = array();

        $categoryId = (isset($_GET['categoryId']))? (int)$_GET['categoryId'] : 0;

        $categoriesCollection = new CategoriesCollection();
        $categories = $categoriesCollection->get(1, null, null, null, null, null);

        $postsCollection = new PostsCollection();

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

        $posts = $postsCollection->get($where, $offset, $pageResults, null, array('date', 'DESC'), 'name');

        $totalRows = count($postsCollection->get(array(), -1, 0, null, array('date', 'DESC'), 'name'));
        $totalRows = ($totalRows == 0)? 1 : $totalRows;

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl('index.php?c=blog&m=postsByCategory&categoryId='.$categoryId);

        $viewData['paginator'] = $paginator;
        $viewData['posts'] = $posts;
        $viewData['categories'] = $categories;

        $this->loadFrontView('blog/list.php', $viewData);
    }
}