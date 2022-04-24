<?php

//namespace app;

declare(strict_types=1);

require_once __DIR__."/core/Application.php";
//require_once __DIR__."/vendor/autoload.php";

$app = new Application();

// Here is created a mapping of paths and files to open.0
$app->router->get('/', 'registration');
//$app->router->post('/handle', [new RegistrationController(), 'HandleRegistration']);

$app->run();