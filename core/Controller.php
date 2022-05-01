<?php

namespace app\core;

class Controller
{
    public function render($template)
    {
        Application::$app->router->renderView($template);
    }
}