<?php

class HomeController extends Controller
{
    public function index()
    {
        $viewData = array();

        $postsCollection = new PostsCollection();
        $posts = $postsCollection->get(array(), 0, 4, null, array('date', 'DESC'), 'title');

//        $toursCollection = new ToursCollection();
//        $randomTours = $toursCollection->getRandomTours();

        $viewData['posts'] = $posts;
        //$viewData['randomTours']   = $randomTours;

        $this->loadFrontView('index.php', $viewData);
    }
}