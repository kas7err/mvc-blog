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

        $alphabet = [
            'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ж', 'З', 'И', 'Й',
            'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У',
            'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ь', 'Ю', 'Я'
        ];
        $posts = Post::select('title')->get();
        $this->view::render('index', ['posts' => $posts, 'alphabet' => $alphabet]);
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
