<?php

class HomeController extends Controller
{
    public function index()
    {
        $viewData = array();

        $projectsCollection = new ProjectsCollection();
        $projects = $projectsCollection->get(array(), 0, 4, null, array('date', 'DESC'), 'title');

        $postsCollection = new PostsCollection();
        $posts = $postsCollection->get(array(), 0, 4, null, array('date', 'DESC'), 'title');

//        $toursCollection = new ToursCollection();
//        $randomTours = $toursCollection->getRandomTours();

        $viewData['projects'] = $projects;
        $viewData['posts'] = $posts;
        //$viewData['randomTours']   = $randomTours;

        $this->loadFrontView('index.php', $viewData);
    }
}