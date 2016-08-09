<?php

class MembersController extends Controller
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
        header('Location: index.php');
    }

}