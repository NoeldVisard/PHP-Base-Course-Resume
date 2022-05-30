<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\mappers\UserMapper;
use app\services\ProfileServices;

class ProfileEditController extends Controller
{
    public function profileEditPage()
    {
        $user = (new UserMapper())->find($_COOKIE['PHP_AUTH_USER_ID']);
        $this->render('profileEdit', ['user' => $user]);
    }

    public function profileEdit(Request $request)
    {
        $body = $request->getBody();
        (new ProfileServices())->editUser($body["username"], $body["password"]);
        header("Location: http://localhost:8080/profile");
    }
}