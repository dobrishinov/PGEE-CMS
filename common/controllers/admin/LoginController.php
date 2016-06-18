<?php

class LoginController extends ErrorController{

    public function __construct()
    {
        if ($this->loggedIn()) {
            header('Location: index.php');
        }
    }

    public function index()
    {
        $viewData = array();
        
        $errors = array();
        if (isset($_POST['submit'])) {
            if (strlen($_POST['username']) < 5 || strlen($_POST['username']) > 50) {
                $errors['credential'] = 'Incorrect username or password';
            }
        
            if (strlen($_POST['password']) < 5  || strlen($_POST['password']) > 50) {
                $errors['credential'] = 'Incorrect username or password';
            }
        
            if (empty($errors)) {
                $adminsCollection = new AdminsCollection();
                $where = array('username' => trim($_POST['username']));
                $admin = $adminsCollection->getUser($where);

                if (!empty($admin)) {
                    if ($admin->getPassword() == sha1(trim($_POST['password']))) {
                        $_SESSION['logged_in'] = 1;
                        $_SESSION['user'] = $admin;
                        header('Location: index.php');
                        die;
                    } else {
                        $errors[] = 'Incorrect username or password';
                    }
                } else {
                    $errors[] = 'Incorrect username or password';
                }
            }
        
        }

        $viewData['errors'] = $errors;

        $this->loadView('login/login.php', $viewData);
    }

    public function logout()
    {
        $_SESSION['logged_in'] = 0;
        $_SESSION['user'] = '';

        header('Location: index.php?c=login');
    }

}