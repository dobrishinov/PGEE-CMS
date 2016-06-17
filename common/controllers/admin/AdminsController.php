<?php

class AdminsController extends Controller
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

        $adminsCollection = new AdminsCollection();

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
                $order = array('username', 'ASC');
                break;
            case 4:
                $order = array('username', 'DESC');
                break;
            default:
                $order = array('id', 'DESC');
        }

        //В променливата $page присвояваме гет параметъра, който се придава. Ако няма гет параметър то тогава слагаме 1.
        $page = (isset($_GET['page']) && (int)$_GET['page'] > 0)? (int)$_GET['page'] : 1;

        //В тази променлива изчисляваме от кой точно резултат да започне броенето в заявката.
        $offset = ($page-1)*$pageResults;

        $admins = $adminsCollection->get(array(), $offset, $pageResults, $search, $order, $column='username');

        $totalRows = count($adminsCollection->get(array(), -1, 0, $search, $order, $column='username'));
        $totalRows = ($totalRows == 0)? 1 : $totalRows;

        $paginator = new Pagination();
        $paginator->setPerPage($pageResults);
        $paginator->setTotalRows($totalRows);
        $paginator->setBaseUrl("index.php?c=admins&perPage={$pageResults}&orderBy={$orderBy}&search={$search}");

        $viewData['admins']      = $admins;
        $viewData['paginator']   = $paginator;
        $viewData['pageResults'] = $pageResults;
        $viewData['search']      = $search;
        $viewData['orderBy']     = $orderBy;

        $this->loadView('admins/list.php', $viewData);
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
            'username'    => '',
            'password'    => '',
            'fullName'    => '',
            'information' => '',
            'phone'       => '',
            'email'       => ''
        );

        if (isset($_POST['submit'])) {

            $data = array(
                'username'      => htmlspecialchars(trim($_POST['username'])),
                'password'      => htmlspecialchars(sha1(trim($_POST['password']))),
                'fullName'      => htmlspecialchars(trim($_POST['fullName'])),
                'information'   => htmlspecialchars(trim($_POST['information'])),
                'phone'         => htmlspecialchars(trim($_POST['phone'])),
                'email'         => htmlspecialchars(trim($_POST['email'])),
            );

            $errors = $this->validate($data);


            if (empty($errors)) {
                $entity = new AdminEntity();
                $entity->init($data);
                $adminsCollection = new AdminsCollection();
                $adminsCollection->save($entity);
                $_SESSION['message']['success'] = ' 1 admin CREATED';
                header('Location: index.php?c=admins');
                die;
            }
        }

        $viewData['data']   = $data;
        $viewData['errors'] = $errors;

        $this->loadView('admins/insert.php', $viewData);
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
            header('Location: index.php?c=admins');
            die;
        }

        $adminsCollection = new AdminsCollection();
        $admin = $adminsCollection->getOne($_GET['id']);

        if (empty($admin)) {
            header('Location: index.php?c=admins');
            die;
        }

        $data = array(
            'id'          => $admin->getId(),
            'username'    => $admin->getUsername(),
            //'password'  => $admin->getPassword(),
            'fullName'    => $admin->getFullName(),
            'information' => $admin->getInformation(),
            'phone'       => $admin->getPhone(),
            'email'       => $admin->getEmail(),
        );

        $errors = array();

        if (isset($_POST['submit'])) {

            $data = array(
                'id'          => $_GET['id'],
                'username'    => htmlspecialchars(trim($_POST['username'])),
                //'password'  => htmlspecialchars(sha1(trim($_POST['password']))),
                'fullName'    => htmlspecialchars(trim($_POST['fullName'])),
                'information' => htmlspecialchars(trim($_POST['information'])),
                'phone'       => htmlspecialchars(trim($_POST['phone'])),
                'email'       => htmlspecialchars(trim($_POST['email'])),
            );

            $errors = $this->validateUpdate($data);
            
            if (empty($errors)) {

                $entity = new AdminEntity();
                $entity->init($data);
                $adminsCollection->save($entity);
                $_SESSION['message']['success'] = ' 1 admin CHANGED';
                header('Location: index.php?c=admins');
                die;
            }
        }
        
        $viewData['data'] = $data;
        $viewData['errors'] = $errors;
        $this->loadView('admins/update.php', $viewData);

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
            header('Location: index.php?c=admins');
            die;
        }

        $adminsCollection = new AdminsCollection();
        $admin = $adminsCollection->getOne($_GET['id']);

        if(is_null($admin->getId())) {
            $_SESSION['message']['warning'] = ' Sorry, but something went wrong!';
            header('Location: index.php?c=admins');
            die;
        }

        $adminsCollection->delete($admin->getId());
        $_SESSION['message']['success'] = ' 1 admin DELETED';
        header('Location: index.php?c=admins');
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

        if(strlen(trim($data['username'])) < 3 || strlen(trim($data['username'])) > 255) {
            $errors['username'] = 'Invalid username length (3 symbols required)';
        }
        if(strlen(trim($data['password'])) < 8 || 
            strlen(trim($data['password'])) > 255 ||
            (trim($data['password'])) == trim('da39a3ee5e6b4b0d3255bfef95601890afd80709')) {
            $errors['password'] = 'Invalid password length (8 symbols required)';
        }
        if(strlen(trim($data['fullName'])) < 3 || strlen(trim($data['fullName'])) > 255) {
            $errors['fullName'] = 'Invalid full name length';
        }
        if(strlen(trim($data['information'])) < 3 || strlen(trim($data['information'])) > 255) {
            $errors['information'] = 'Invalid information length';
        }
        if(strlen(trim($data['phone'])) < 3 || strlen(trim($data['phone'])) > 255) {
            $errors['phone'] = 'Invalid phone length';
        }
        if(strlen(trim($data['email'])) < 3 || strlen(trim($data['email'])) > 255) {
            $errors['email'] = 'Invalid email length';
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

        if(strlen(trim($_POST['username'])) < 3 || strlen(trim($_POST['username'])) > 255) {
            $errors['username'] = 'Invalid username length (3 symbols required)';
        }
//    if(strlen(trim($_POST['password'])) < 8 || strlen(trim($_POST['password'])) > 255) {
//        $errors['password'] = 'Invalid password length (8 symbols required)';
//    }
        if(strlen(trim($_POST['fullName'])) < 3 || strlen(trim($_POST['fullName'])) > 255) {
            $errors['fullName'] = 'Invalid full name length';
        }
        if(strlen(trim($_POST['information'])) < 3 || strlen(trim($_POST['information'])) > 255) {
            $errors['information'] = 'Invalid information length';
        }
        if(strlen(trim($_POST['phone'])) < 3 || strlen(trim($_POST['phone'])) > 255) {
            $errors['phone'] = 'Invalid phone length';
        }
        if(strlen(trim($_POST['email'])) < 3 || strlen(trim($_POST['email'])) > 255) {
            $errors['email'] = 'Invalid email length';
        }
        
        return $errors;
    }

    public function preview()
    {
        header('Location: index.php?c=error');
        die;
    }

}