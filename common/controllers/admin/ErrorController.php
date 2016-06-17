<?php

class ErrorController extends Controller
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
        $this->loadView('error.php');
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