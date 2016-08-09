<?php

abstract class Controller {

    public function __construct()
    {
        
    }


    public function index() {
        echo 'IMPLEMENT INDEX METHOD IN YOUR CONTROLLER PLEASE !!!';
    }

    public function getSchoolParams()
    {
        $schoolCollection = new SchoolCollection();
        $school = $schoolCollection->get(array(), null, null, null, array('date', 'ASC'), 'title');

        return $school;
    }

    public function getPostsParams()
    {
        $postsCollection = new PostsCollection();
        $posts = $postsCollection->get(array(), null, null, null, array('date', 'ASC'), 'title');

        return $posts;
    }

    public function getProjectsParams()
    {
        $projectsCollection = new ProjectsCollection();
        $projects = $projectsCollection->get(array(), null, null, null, array('date', 'ASC'), 'title');

        return $projects;
    }

    public function loadView($viewName, $data = array())
    {
        extract($data);
        require_once __DIR__.'/../views/admin/'.$viewName;
    }

    public function loadFrontView($viewName, $data= array())
    {
        extract($data);
        require_once __DIR__.'/../views/frontend/'.$viewName;
    }
    
    public function loggedIn(){
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != 1 || !isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
    
    
}




