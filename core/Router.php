<?php

//namespace app\core;

declare(strict_types=1);

class Router
{
    public array $routes = [];

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

//    public function post($path, $callback)
//    {
//        $this->routes['post'][$path] = $callback;
//    }

    public function resolve()
    {
        $method = 'get';
        $path = '/';
        $callback = $this->routes[$method][$path];

        require_once __DIR__."/../view/$callback.php";
    }
}