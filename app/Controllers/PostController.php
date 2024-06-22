<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Post;
use Core\Application;
use Core\Request;

class PostController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if (Application::isGuest()) {
            Application::$app->session->setFlash('info', 'You have to login to be able to use this route!');
            redirect('/stl-admin/login');
        }
    }

    public function create()
    {
        $this->view::render('articles.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->loadData($request->all());
        if ($post->validate() && $post->save()) {
            Application::$app->session->setFlash('info', "New post: " .  $post->title . " has been created");
            redirect('/stl-admin');
            return;
        }

        $this->view::render('articles.create', ['errors' => $post->errors]);
    }

    public function edit(Request $request)
    {
        $post = Post::where('id', $request->get('id'))->first();
        $this->view::render('articles.update', ['post' => $post]);
    }

    public function update(Request $request)
    {
        $post = Post::where('id', $request->get('id'))->first();
        $post->loadData($request->all());
        if ($post->validate() && $post->save()) {
            Application::$app->session->setFlash('info', "New post: " .  $post->title . " has been created");
            redirect('/stl-admin');
            return;
        }

        $this->view::render('articles.update', [
            'post' => $post,
            'errors' => $post->errors
        ]);
    }

    public function destroy(Request $request)
    {
        $post = Post::where('id', $request->get('id'))->first();
        if(!$post) {
            return new ErrorController;
        }

        $post->delete();
        Application::$app->session->setFlash('info', $post->title . ": has been deleted");
        redirect('/stl-admin');
    }
}
