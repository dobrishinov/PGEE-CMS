<?php

class CategoriesController extends Controller
{
    public function __construct()
    {
        if (!$this->loggedIn()) {
            header('Location: index.php?c=login');
        }
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
        $paginator->setBaseUrl("index.php?c=categories&perPage={$pageResults}&orderBy={$orderBy}&search={$search}");

        $viewData['categories']  = $categories;
        $viewData['paginator']   = $paginator;
        $viewData['pageResults'] = $pageResults;
        $viewData['search']      = $search;
        $viewData['orderBy']     = $orderBy;

        $this->loadView('categories/list.php', $viewData);
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
        $data = array(
            'name'        => '',
            'description' => '',
        );
        if (isset($_POST['submit'])) {
            
            $data = array(
                'name'        => htmlspecialchars(trim($_POST['name'])),
                'description' => htmlspecialchars(trim($_POST['description'])),
            );

            $errors = $this->validate($data);
            
            if (empty($errors)) {
                $categoriesCollection = new CategoriesCollection();
                $entity = new CategoryEntity();
                $entity->init($data);
                $categoriesCollection->save($entity);
                $_SESSION['message']['success'] = ' 1 category CREATED';
                header('Location: index.php?c=categories');
                die;
            }
        }
        
        $viewData['data']   = $data;
        $viewData['errors'] = $errors;
        
        $this->loadView('categories/insert.php', $viewData);
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
            header('Location: index.php?c=categories');
            die;
        }

        $categoriesCollection = new CategoriesCollection();
        $category = $categoriesCollection->getOne($_GET['id']);

        if (empty($category)) {
            header('Location: index.php?c=categories');
            die;
        }

        $data = array(
            'id'          => $category->getId(),
            'name'        => $category->getName(),
            'description' => $category->getDescription(),
        );

        $errors = array();

        if (isset($_POST['submit'])) {
            $data = array(
                'id'            => htmlspecialchars(trim($_GET['id'])),
                'name'          => htmlspecialchars(trim($_POST['name'])),
                'description'   => htmlspecialchars(trim($_POST['description'])),
            );

            $errors = $this->validateUpdate($data);
            
            if (empty($errors)) {
                $entity = new CategoryEntity();
                $entity->init($data);
                $categoriesCollection->save($entity);
                $_SESSION['message']['success'] = ' 1 category UPDATED';
                header('Location: index.php?c=categories');
                die;
            }
        }

        $viewData['data']   =  $data;
        $viewData['errors'] = $errors;

        $this->loadView('categories/update.php', $viewData);
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
            header('Location: index.php?c=categories');
            die;
        }

        $categoriesCollection = new CategoriesCollection();
        $category = $categoriesCollection->getOne($_GET['id']);

        if(is_null($category->getId())) {
            $_SESSION['message']['warning'] = ' Sorry, but something went wrong!';
            header('Location: index.php?c=categories');
            die;
        }

        $categoriesCollection->delete($category->getId());
        $_SESSION['message']['success'] = ' 1 category DELETED';
        header('Location: index.php?c=categories');
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

        if(strlen(trim($data['name'])) < 3 || strlen(trim($data['name'])) > 255) {
            $errors['name'] = 'Invalid category name length';
        }
        if(strlen(trim($data['description'])) < 3 || strlen(trim($data['description'])) > 500) {
            $errors['description'] = 'Invalid category description length';
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

        if(strlen(trim($data['name'])) < 3 || strlen(trim($data['name'])) > 255) {
            $errors['name'] = 'Invalid category name length';
        }
        if(strlen(trim($data['description'])) < 3 || strlen(trim($data['description'])) > 500) {
            $errors['description'] = 'Invalid category description length';
        }

        return $errors;
    }

    /*
     *
     * PREVIEW FUNCTION
     *
     */
    public function preview()
    {
        header('Location: index.php?c=error');
        die;
    }

}