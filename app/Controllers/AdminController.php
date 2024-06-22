<?php

namespace App\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Controllers\BaseController;
use Core\Application;

class AdminController extends BaseController
{
    public $admin;

    public function __construct()
    {
        parent::__construct();
        if (Application::isGuest()) {
            Application::$app->session->setFlash('info', 'You have to login to be able to use this route!');
            redirect('/stl-admin/login');
        }
    }

    public function index()
    {
        $posts = Post::all();
        $this->view::render('admin.index', ['posts' => $posts]);
    }
}
