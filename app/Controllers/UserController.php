<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        $data['title'] = lang('App.users');
        $data['users'] = $this->user->getUsers();
        return view('users/index', $data);
    }

    public function create()
    {
        $data['title'] = lang('App.users');
        return view('users/create', $data);
    }

    public function store()
    {
        
    }
}