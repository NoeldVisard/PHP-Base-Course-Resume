<?php

declare(strict_types=1);

namespace app\core;

use Exception;

class Router
{
    public array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
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
        $callback = $this->routes[$method][$path] ?? false;

//         Work of Logger.php:
//        $callback = 1;

        if (is_string($callback)) {
            $this->renderView($callback);
        }

        if (is_array($callback)) {
            return call_user_func($callback, $this->request);
        }

        if ($callback === false) {
            $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
        }

        throw new Exception("Not existing type");
    }

    public function renderView($template)
    {
        require_once __DIR__."/../view/$template.php";
    }
}