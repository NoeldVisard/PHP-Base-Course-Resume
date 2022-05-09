<?php

declare(strict_types=1);

namespace app\core;

use Exception;
use Psr\Log\LogLevel;

class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;
    private Logger $logger;

    public function __construct()
    {
        require_once __DIR__."/Router.php";
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->logger = new Logger(__DIR__ . getenv('LOG_FILE'));
    }

    public function run()
    {
        try {
            $this->router->resolve();
        } catch (Exception $e) {
            $this->logger->log(LogLevel::ERROR, 'couldn\'t solve request');
            $this->response->setStatusCode(Response::HTTP_SERVER_ERROR);
        }
    }


}
