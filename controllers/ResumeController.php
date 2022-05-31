<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\mappers\ResumeMapper;
use app\services\ResumeServices;

class ResumeController extends Controller
{
    public function resumePage(Request $request)
    {
        $resume = (new ResumeMapper())->findByUserId($_COOKIE['PHP_AUTH_USER_ID']);
        $this->render('resume', ['resume' => $resume]);
    }

    public function resumeEditPage(Request $request)
    {
        $resume = (new ResumeMapper())->findByUserId($_COOKIE['PHP_AUTH_USER_ID']);
        $this->render('resumeEdit', ['resume' => $resume]);
    }

    public function resumeEdit(Request $request)
    {
        $body = $request->getBody();
        (new ResumeServices)->editResume($body['telegram'], $body['phone'], $body['skills'], $body['experience'], $body['education'], $body['courses'], $body['projects']);
        header("Location: http://localhost:8080/resumeEditPage");
    }
}