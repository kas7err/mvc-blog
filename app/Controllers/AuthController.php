<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use Core\Application;
use Core\Request;

class AuthController extends BaseController
{
    public function login(Request $request)
    {
        $user = new User();
        if($request->getMethod() == 'post') {
            $user->loadData($request->all());
            if ($user->validate() && $user->login()) {
                redirect('/stl-admin');
                return;
            }
        }

        $this->view::render('auth.login', ['errors' => $user->errors]);
    }

    public function logout(Request $request)
    {
        Application::$app->logout();
        redirect('/');
    }

}
