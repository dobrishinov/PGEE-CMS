<?php

class DashboardController extends Controller
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

        $projectsCollection = new ProjectsCollection();
        $projects = count($projectsCollection->get(array(), 0, -1, null, null, $column='title'));

        $postsCollection = new PostsCollection();
        $posts = count($postsCollection->get(array(), 0, -1, null, null, $column='title'));

        $categoriesCollection = new CategoriesCollection();
        $categories = count($categoriesCollection->get(array(), 0, -1, null, null, $column='name'));

        $usersCollection = new UsersCollection();
        $users = count($usersCollection->get(array(), 0, -1, null, null, $column='username'));

        $viewData['projects']   = $projects;
        $viewData['posts']      = $posts;
        $viewData['categories'] = $categories;
        $viewData['users']      = $users;

        $this->loadView('dashboard.php', $viewData);
    }

    /*
     *
     * INSERT FUNCTION
     *
     */
    public function insert()
    {
        header('Location: index.php?c=error');
        die;
    }

    /*
     *
     * UPDATE FUNCTION
     *
     */
    public function update()
    {
        header('Location: index.php?c=error');
        die;
    }

    /*
     *
     * DELETE FUNCTION
     *
     */
    public function delete()
    {
        header('Location: index.php?c=error');
        die;
    }

    /*
     *
     * VALIDATE FUNCTION
     *
     */
    protected function validate($data)
    {
        header('Location: index.php?c=error');
        die;
    }

    /*
     *
     * VALIDATE UPDATE FUNCTION
     *
     */
    protected function validateUpdate($data)
    {
        header('Location: index.php?c=error');
        die;
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