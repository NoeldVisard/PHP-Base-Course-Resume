<?php

declare(strict_types=1);

namespace app\core;

class Router
{
    public array $routes = [];
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        $callback = $this->routes[$method][$path];

        if (is_string($callback)) {
            $this->renderView($callback);
        }

        if (is_array($callback)) {
            return call_user_func($callback, $this->request);
        }
    }

    public function renderView($template)
    {
        require_once __DIR__."/../view/$template.php";
    }
}