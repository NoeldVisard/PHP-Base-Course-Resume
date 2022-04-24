<?php

declare(strict_types=1);

namespace app;

use app\controllers\RegistrationController;
use app\core\Application;

require_once __DIR__."/vendor/autoload.php";

$app = new Application();

// Here is created a mapping of paths and files to open.0
$app->router->get('/', 'registration');
$app->router->post('/registrationController', [new RegistrationController(), 'handleRegistration']);

$app->run();