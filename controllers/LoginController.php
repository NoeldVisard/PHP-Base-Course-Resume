<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\services\LoginServices;

class LoginController extends Controller
{
    public function loginPage()
    {
        $this->render('login');
    }

    public function login(Request $request)
    {
        $body = $request->getBody();
        $loginServices = new LoginServices();

        if ($loginServices->canLogin($body)) {
            $_SERVER['PHP_AUTH_STATE'] = true;
        } else {
            Application::$app->response->setStatusCode(Response::HTTP_UNAUTHORIZED);
            header("Location: http://localhost:8080/login");
        }
    }


}