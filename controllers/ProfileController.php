<?php

namespace app\controllers;

use app\core\Controller;
use app\services\ProfileServices;

class ProfileController extends Controller
{
    public function profilePage()
    {
        $user = (new ProfileServices())->getUserById();
        $this->render('profile', ['user' => $user]);
    }
}