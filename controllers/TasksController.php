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

    public function deleteTask(Request $request)
    {
        $body = $request->getBody();
        $task = key($body);
        (new TasksServices())->deleteTask($task);
        header("Location: http://localhost:8080/tasks");
    }

    public function editTaskPage(Request $request)
    {
        $body = $request->getBody();
        $taskServices = new TasksServices();
        $task = $taskServices->getTaskById(key($body));
        $taskServices->setEditTaskId(key($body));
        $this->render('taskEdit', ['task' => $task]);
    }

    public function editTask(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        (new TasksServices())->editTask($_COOKIE['PHP_EDIT_TASK_ID'], $body['text']);
        header("Location: http://localhost:8080/tasks");
    }
}