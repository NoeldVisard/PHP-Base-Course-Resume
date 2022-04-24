<?php

namespace app\controllers;

use app\core\Request;

class RegistrationController
{
    public function handleRegistration(Request $request)
    {
        $body = $request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        exit;
    }

    public function registration()
    {

    }
}
