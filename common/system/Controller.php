<?php

abstract class Controller {

    public function __construct()
    {
        
    }


    public function index() {
        echo 'IMPLEMENT INDEX METHOD IN YOUR CONTROLLER PLEASE !!!';
    }

    public function loadView($viewName, $data = array())
    {
        extract($data);
        require_once __DIR__.'/../views/admin/'.$viewName;
    }
    
    public function loggedIn(){
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1 || !isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
    
    
    
}




