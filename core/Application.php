<?php

namespace Core;

use App\Models\User;
use Core\Router;
use Core\Request;
use Core\Session;

class Application
{
    public Router $router;
    public Request $request;
    public Session $session;
    public static Application $app;
    public ?User $user;

    public function __construct()
    {
        self::$app = $this;
        $this->user = null;
        $this->request = new Request();
        $this->session = new Session();
        $this->router = new Router($this->request);

        $userId = Application::$app->session->get('user');
        if ($userId) {
            $this->user = User::where('id', $userId)->first();
        }
    }

    public function run()
    {
        $this->router->resolve();
    }

    public function login(User $user)
    {
        $this->user = $user;
        Application::$app->session->set('user', $user->id);

        return true;
    }

    public function logout()
    {
        $this->user = null;
        self::$app->session->remove('user');
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }
}
