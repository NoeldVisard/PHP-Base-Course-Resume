<?php

declare(strict_types=1);

namespace app\core;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;

    public function __construct()
    {
        require_once __DIR__."/Router.php";
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        $this->router->resolve();
    }


}
