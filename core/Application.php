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
    public Logger $logger;
    public Database $database;

    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->logger = new Logger(__DIR__ . getenv('LOG_FILE'));
        $this->database = new Database($_ENV['DB_DSN'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
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
