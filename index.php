<?php

declare(strict_types=1);

namespace app;

use app\controllers\RegistrationController;
use app\core\Application;
use app\core\ConfigParser;

require_once __DIR__."/vendor/autoload.php";
(new ConfigParser(__DIR__ . '/../.env'))->load();

if (getenv('APP_ENV') === 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

if (getenv('APP_ENV') === 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

$app = new Application();

// Here is created a mapping of paths and files to open.0
$app->router->get('/', 'welcome');
$app->router->get('/registration', [new RegistrationController(), 'registration']);
$app->router->post('/registrationController', [new RegistrationController(), 'handleRegistration']);

$app->run();