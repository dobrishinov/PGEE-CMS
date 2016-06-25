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
        $viewData = array();

        $adminsCollection = new AdminsCollection();

        $members = $adminsCollection->get(array(), null, null, null, array('id', 'ASC'), $column='username');

        $viewData['members'] = $members;

        $this->loadFrontView('members/list.php', $viewData);
    }

}