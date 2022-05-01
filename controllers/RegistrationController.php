<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class RegistrationController extends Controller
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
        $template = 'registration';
        $this->render($template);
    }
}
