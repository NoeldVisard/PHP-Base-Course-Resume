<?php

declare(strict_types=1);

namespace app;

use app\controllers\LoginController;
use app\controllers\NotFoundController;
use app\controllers\RegistrationController;
use app\controllers\TasksController;
use app\core\Application;
use app\core\ConfigParser;

require_once __DIR__."/vendor/autoload.php";
(new ConfigParser(__DIR__ . '/env.json'))->load();

if (getenv('APP_ENV') === 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . getenv('FILE_LOG'));
}

$app = new Application();

// Here is created a mapping of paths and files to open.
$app->router->setGetPath('/', 'welcome');
$app->router->setGetPath('/registration', [new RegistrationController(), 'registrationPage']);
$app->router->setPostPath('/registrationController', [new RegistrationController(), 'registration']);
$app->router->setGetPath('/404', [new NotFoundController(), 'notFound']);
$app->router->setGetPath('/login', [new LoginController(), 'loginPage']);
$app->router->setPostPath('/loginController', [new LoginController(), 'login']);
$app->router->setGetPath('/tasks', [new TasksController(), 'tasksPage']);
$app->router->setPostPath('/addTaskController', [new TasksController(), 'addTask']);
$app->router->setPostPath('/deleteTaskController', [new TasksController(), 'deleteTask']);

$app->run();