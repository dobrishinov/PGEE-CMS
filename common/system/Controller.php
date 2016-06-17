<?php

abstract class Controller {

    public function __construct()
    {
//        if (!$this->loggedIn()) {
//            header('Location: login.php');
//        }
    }


    public function index() {
        echo 'IMPLEMENT INDEX METHOD IN YOUR CONTROLLER PLEASE !!!';
    }

    public function loadView($viewName, $data = array())
    {
        extract($data);
        require_once __DIR__.'/../views/admin/'.$viewName;
    }
    
    abstract public function insert();
    abstract public function update();
    abstract public function delete();
    abstract protected function validate($data);
    abstract protected function validateUpdate($data);
    abstract public function preview();
    

//    public function loggedIn(){
//        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1 || !isset($_SESSION['user'])) {
//            return false;
//        }
//        return true;
//    }
}




