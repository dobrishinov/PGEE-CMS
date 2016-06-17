<?php

class PostsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*
     *
     * INDEX VIEW
     *
     */
    public function index()
    {
        $viewData = array();

        $search = (isset($_GET['search'])) ? htmlspecialchars(trim($_GET['search'])) : '';
        
        $postsCollection = new PostsCollection();

        //В тази променлива пазим броя резултати които искаме да върне заявката
        //$pageResults = (isset($_GET['perPage']))? (int)$_GET['perPage'] : 5;
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
                $order = array('date', 'DESC');
                break;
            case 2:
                $order = array('date', 'ASC');
                break;
            case 3:
                $order = array('title', 'ASC');
                break;
            case 4:
                $order = array('title', 'DESC');
                break;
            default:
                $order = array('date', 'DESC');
        }


        //В променливата $page присвояваме гет параметъра, който се придава. Ако няма гет параметър то тогава слагаме 1.
        $page = (isset($_GET['page']) && (int)$_GET['page'] > 0)? (int)$_GET['page'] : 1;

        //В тази променлива изчисляваме от кой точно резултат да започне броенето в заявката.
        $offset = ($page-1)*$pageResults;

        $posts = $postsCollection->get(array(), $offset, $pageResults, $search, $order, 'title');

        $totalRows = count($postsCollection->get(array(), -1, 0, $search, $order, 'title'));
        $totalRows = ($totalRows == 0)? 1 : $totalRows;

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl("index.php?c=posts&perPage={$pageResults}&orderBy={$orderBy}&search={$search}");

        $viewData['posts']       = $posts;
        $viewData['paginator']   = $paginator;
        $viewData['pageResults'] = $pageResults;
        $viewData['search']      = $search;
        $viewData['orderBy']     = $orderBy;

        $this->loadView('posts/list.php', $viewData);
    }

    /*
     *
     * INSERT FUNCTION
     *
     */
    public function insert()
    {
        $viewData = array();

        $errors = array();

        $categoriesCollection = new CategoriesCollection();
        $categories = $categoriesCollection->get(1, NULL, NULL, NULL, NULL, NULL);
        $authorCollection = new AdminsCollection();
        $authors = $authorCollection->get(1, NULL, NULL, NULL, NULL, NULL);

        $data = array(
            'title'          => '',
            'description'    => '',
            'categoryName'   => '',
            'authorName'     => '',
            'date'           => '',
            'content'        => '',
        );

        if (isset($_POST['submit'])) {

            $data = array(
                'title'         => htmlspecialchars(trim($_POST['title'])),
                'description'   => htmlspecialchars(trim($_POST['description'])),
                'categoryName'  => htmlspecialchars(trim($_POST['categoryName'])),
                'authorName'    => htmlspecialchars(trim($_POST['authorName'])),
                'date'          => htmlspecialchars(trim($_POST['date'])),
                'content'       => htmlspecialchars(trim($_POST['content'])),
            );

            $errors = $this->validate($data);

            if (empty($errors)) {
                $entity = new PostEntity();
                $entity->init($data);
                $postsCollection = new PostsCollection();
                $postsCollection->save($entity);
                $_SESSION['message']['success'] = ' 1 post CREATED';
                header('Location: index.php?c=posts');
                die;
            }
        }

        $viewData['data']       = $data;
        $viewData['errors']     = $errors;
        $viewData['categories'] = $categories;
        $viewData['authors']    = $authors;

        $this->loadView('posts/insert.php', $viewData);
    }

    /*
     *
     * UPDATE FUNCTION
     *
     */
    public function update()
    {
        $viewData = array();

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=posts');
            die;
        }

        $postsCollection = new PostsCollection();
        $post = $postsCollection->getOne($_GET['id']);

        $categoriesCollection = new CategoriesCollection();
        $categories = $categoriesCollection->get($_GET['id'], NULL, NULL, NULL, NULL, NULL);

        $authorCollection = new AdminsCollection();
        $authors = $authorCollection->get($_GET['id'], NULL, NULL, NULL, NULL, NULL);


        if (empty($post)) {
            header('Location: index.php?c=posts');
            die;
        }

        $data = array(
            'id'             => $post->getId(),
            'title'          => $post->getTitle(),
            'description'    => $post->getDescription(),
            'categoryName'   => $post->getCategoryName(),
            'authorName'     => $post->getAuthorName(),
            'date'           => $post->getDate(),
            'content'        => htmlspecialchars_decode($post->getContent()),
        );

        $errors = array();

        if (isset($_POST['submit'])) {
            $data = array(
                'id'            => htmlspecialchars(trim($_GET['id'])),
                'title'         => htmlspecialchars(trim($_POST['title'])),
                'description'   => htmlspecialchars(trim($_POST['description'])),
                'categoryName'  => htmlspecialchars(trim($_POST['categoryName'])),
                'authorName'    => htmlspecialchars(trim($_POST['authorName'])),
                'date'          => htmlspecialchars(trim($_POST['date'])),
                'content'       => htmlspecialchars(trim($_POST['content'])),
            );

            $errors = $this->validateUpdate($data);

            if (empty($errors)) {

                $entity = new PostEntity();
                $entity->init($data);
                $postsCollection->save($entity);
                $_SESSION['message']['success'] = ' 1 post CHANGED';
                header('Location: index.php?c=posts');
                die;
            }
        }

        $viewData['data']       = $data;
        $viewData['errors']     = $errors;
        $viewData['categories'] = $categories;
        $viewData['authors']    = $authors;

        $this->loadView('posts/update.php', $viewData);
    }

    /*
     *
     * DELETE FUNCTION
     *
     */
    public function delete()
    {
        if(!isset($_GET['id'])) {
            $_SESSION['message']['warning'] = ' Sorry, but something went wrong!';
            header('Location: index.php?c=posts');
            die;
        }

        $postsCollection = new PostsCollection();
        $post = $postsCollection->getOne($_GET['id']);

        if(is_null($post->getId())) {
            $_SESSION['message']['warning'] = ' Sorry, but something went wrong!';
            header('Location: index.php?c=posts');
            die;
        }

        $postsCollection->delete($post->getId());
        $_SESSION['message']['success'] = ' 1 post DELETED';
        header('Location: index.php?c=posts');
        die;
    }

    /*
     *
     * VALIDATE FUNCTION
     *
     */
    protected function validate($data)
    {
        $errors = array();

        if(strlen(trim($data['title'])) < 3 || strlen(trim($data['title'])) > 255) {
            $errors['title'] = 'Invalid title length (3 symbols required)';
        }
        if(strlen(trim($data['description'])) < 8 || strlen(trim($data['description'])) > 255) {
            $errors['description'] = 'Invalid description length (8 symbols required)';
        }
        if(strlen(trim($data['categoryName'])) == 0) {
            $errors['categoryName'] = 'Invalid category';
        }
        if(strlen(trim($data['authorName'])) == 0) {
            $errors['authorName'] = 'Invalid author';
        }
        if(strlen(trim($data['date'])) == 0) {
            $errors['date'] = 'Invalid date';
        }
        if(strlen(trim($data['content'])) < 15) {
            $errors['content'] = '<h1 style="text-align: center;"><b style="font-size: larger; color: red;">Invalid content length</b></h1>';
        }

        return $errors;
    }

    /*
     *
     * VALIDATE UPDATE FUNCTION
     *
     */
    protected function validateUpdate($data)
    {
        $errors = array();

        if(strlen(trim($data['title'])) < 3 || strlen(trim($data['title'])) > 255) {
            $errors['title'] = 'Invalid title length (3 symbols required)';
        }
        if(strlen(trim($data['description'])) < 8 || strlen(trim($data['description'])) > 255) {
            $errors['description'] = 'Invalid description length (8 symbols required)';
        }
        if(strlen(trim($data['categoryName'])) == 0) {
            $errors['categoryName'] = 'Invalid category';
        }
        if(strlen(trim($data['authorName'])) == 0) {
            $errors['authorName'] = 'Invalid author';
        }
        if(strlen(trim($data['date'])) == 0) {
            $errors['date'] = 'Invalid date';
        }
        if(strlen(trim($data['content'])) < 15) {
            $errors['content'] = '<h1 style="text-align: center;"><b style="font-size: larger; color: red;">Invalid content length</b></h1>';
        }

        return $errors;
    }

    public function preview()
    {
        $viewData = array();

        if (!isset($_GET['id'])) {
            header('Location: index.php?c=posts');
            die;
        }

        $postsCollection = new PostsCollection();
        $post = $postsCollection->getOne($_GET['id']);

        if (empty($post)) {
            header('Location: index.php?c=posts');
            die;
        }

        $viewData['post'] = $post;

        $this->loadView('posts/preview.php', $viewData);
    }

}

