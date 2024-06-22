<?php

namespace Core;

use App\Controllers\ErrorController;
use Core\Request;

class Router
{
    protected array $routes;
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            return new ErrorController;
        }

        try {
            $controllerName = $callback[0];
            if (class_exists($controllerName)) {
                $controller = new $controllerName;
                if (method_exists($controller, $callback[1])) {
                    $controller->{$callback[1]}($this->request);
                }
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
