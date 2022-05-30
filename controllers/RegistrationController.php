<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\exceptions\FileSystemException;
use app\mappers\UserMapper;
use app\models\User;
use app\services\RegistrationServices;

class RegistrationController extends Controller
{
    public function registration(Request $request)
    {
        $body = $request->getBody();
        $registrationServices = new RegistrationServices();
        if ($registrationServices->canRegister($body["password"], $body["password2"], $body["email"])) {
//             Old version
//            $registerModel = (new User())->assign($body);
//            $registerModel->save();
            $user = new User($body['username'], $body['email'], $body['password']);
            $mapper = new UserMapper();
            $mapper->insert($user);
            header("Location: http://localhost:8080/login");
        } else {
            header("Location: http://localhost:8080/registration");
        }
    }

    public function registrationPage()
    {
        $template = 'registration';
        $this->render($template);
    }

}
