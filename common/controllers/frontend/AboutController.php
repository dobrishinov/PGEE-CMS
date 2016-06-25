<?php

class AboutController extends Controller
{
    public function __construct()
    {
    }

    /*
     *
     * INDEX VIEW
     *
     */
    public function index()
    {
        $viewData = array();

        $projectsCollection = new ProjectsCollection();
        $projects = count($projectsCollection->get(array(), 0, -1, null, null, $column='title'));

        $postsCollection = new PostsCollection();
        $posts = count($postsCollection->get(array(), 0, -1, null, null, $column='title'));

        $adminsCollection = new AdminsCollection();
        $admins = count($adminsCollection->get(array(), 0, -1, null, null, $column='username'));

        $viewData['projects']   = $projects;
        $viewData['posts']      = $posts;
        $viewData['admins']      = $admins;


        $this->loadFrontView('about/about.php', $viewData);
    }

    
}