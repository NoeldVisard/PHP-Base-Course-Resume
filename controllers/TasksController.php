<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\services\TasksServices;

class TasksController extends Controller
{

    public function tasksPage()
    {
        $tasks = (new TasksServices())->getTasks();
        $this->render('tasks', ['tasks' => $tasks]);
    }

    public function addTask(Request $request)
    {
        $body = $request->getBody();
        $tasksServices = new TasksServices();

        if ($tasksServices->addTask($body)) {
            header("Location: http://localhost:8080/tasks");
        } else {
            header("Location: http://localhost:8080/login");
        }

    }
}