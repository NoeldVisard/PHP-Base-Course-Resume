<?php

declare(strict_types=1);

namespace app\core;

class Application
{
    public Router $router;
    public Request $request;
    public static Application $app;

    public function __construct()
    {
        require_once __DIR__."/Router.php";
        self::$app = $this;
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $this->router->resolve();
    }


}
