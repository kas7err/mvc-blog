<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use App\Models\User;
use Core\Request;

class HomeController extends BaseController
{
    public function index()
    {
        $admin = User::where('name', 'admin')->first();
        if (!$admin) {
            $user = new User();
            $user->name = "admin";
            $user->password = password_hash('admin', PASSWORD_DEFAULT);
            $user->email = "admin@gmail.com";
            $user->save();
        }

        $posts = Post::orderBy('title', 'asc')->get();
        $this->view::render('index', ['posts' => $posts]);
    }

    public function showArticle(Request $request)
    {
        $article = Post::where('title', $request->get('title'))->first();
        if(!$article) {
            return new ErrorController();
        }

        $this->view::render('articles.show', ['article' => $article]);
    }
}
