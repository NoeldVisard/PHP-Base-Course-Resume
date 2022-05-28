<?php

declare(strict_types=1);

namespace app\services;

use app\core\Model;
use app\mappers\TaskMapper;
use app\models\Task;

class TasksServices extends SiteServices
{
    public function addTask(array $body): bool
    {
        if ($this->isUserAuthorized()) {
            $task = new Task($body['text'], (int) $_COOKIE['PHP_AUTH_USER_ID']);
            $mapper = new TaskMapper();
            $mapper->insert($task);
            return true;
        } else {
            return false;
        }
    }

    public function getTasks(): array
    {
        $taskMapper = new TaskMapper();
        $tasksGenerator = $taskMapper->findByUserId((int) $_COOKIE['PHP_AUTH_USER_ID'])->getNextRow();
        $task = $tasksGenerator->current();
        $tasks = [];
        while ($task) {
            $tasks[] = $task;
            $tasksGenerator->next();
            $task = $tasksGenerator->current();
        }

        return $tasks;
    }

    public function deleteTask(string $task)
    {
        $taskId = (int) substr($task, 2);
        $taskMapper = new TaskMapper();
        $taskMapper->delete($taskId);
    }

    public function getTaskById(int|string $key): Model
    {
        $id = (int) substr($key, 2);
        $taskMapper = new TaskMapper();
        return $taskMapper->find($id);
    }

    public function setEditTaskId(string $key): void
    {
        $taskId = substr($key, 2);
        setcookie('PHP_EDIT_TASK_ID', $taskId);
    }

    public function editTask(int $taskId, string $newText)
    {
        echo "editTask $taskId $newText";
        $taskMapper = new TaskMapper();
        $userId = $taskMapper->find($taskId)->getUserId();
        $newTask = $taskMapper->create(array('text' => $newText, 'user_id' => $userId,'id' => $taskId ));
        $taskMapper->update($newTask);
    }


}