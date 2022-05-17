<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class NotFoundController extends Controller
{
    public function notFound(Request $request)
    {
        $this->render('notFound');
    }

}