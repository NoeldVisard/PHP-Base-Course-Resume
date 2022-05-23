<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\services\LoginServices;

class LoginController extends Controller
{
    private LoginServices $loginServices;

    public function loginPage()
    {
        $this->render('login');
    }

    public function login(Request $request)
    {
        $body = $request->getBody();
        $this->loginServices = new LoginServices();

        $user = $this->loginServices->isUserExists($body['email']);
        if ($user && $this->loginServices->isPasswordEquals($body['password'], $user->getPassword())) {
            $_SERVER['PHP_AUTH_STATE'] = true;
        } else {
            header('HTTP/1.1 401 Unauthorized');
            header("Location: http://localhost:8080/login");

        }
    }


}