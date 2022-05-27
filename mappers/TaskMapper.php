<?php

namespace app\mappers;

use app\core\Collection;
use app\core\Mapper;
use app\core\Model;
use app\models\Task;

class TaskMapper extends Mapper
{
    private \PDOStatement $update;
    private \PDOStatement $delete;
    private \PDOStatement $insert;
    private \PDOStatement $find;
    private \PDOStatement $findAll;

    private \PDOStatement $findByUserId;

    public function __construct()
    {
        parent:: __construct();
        $this->update = $this->getPdo()->prepare("UPDATE task SET text = :text, user_id = :user_id WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM task WHERE id = :id");
        $this->insert = $this->getPdo()->prepare("INSERT INTO task (text, user_id) VALUES (:text, :user_id)");
        $this->find = $this->getPdo()->prepare("SELECT * FROM task WHERE id = :id");
        $this->findAll = $this->getPdo()->prepare("SELECT * FROM task");

        $this->findByUserId = $this->getPdo()->prepare("SELECT * FROM task WHERE user_id = :user_id");
    }

    protected function doInsert(Model $object): Model
    {
        $this->insert->execute(
            [
                'text' => $object->getText(),
                'user_id' => $object->getUserId()
            ]
        );

        $rowId = $this->getPdo()->lastInsertId();
        $object->setId($rowId);
        return $object;
    }

    protected function doUpdate(Model $object): void
    {
        try {
            $this->update->execute(
                [
                    'id' => $object->getId(),
                    'text' => $object->getText(),
                    'user_id' => $object->getUserId()
                ]
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    protected function doDelete(int $id): void
    {
        try {
            $this->delete->execute(
                [
                    'id' => $id
                ]
            );
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
}

    protected function doCreate(array $object): Model
    {
        return new Task($object['text'], $object['user_id'], $object['id']);
    }

    protected function select(): \PDOStatement
    {
        return $this->find;
    }

    protected function selectAll(): \PDOStatement
    {
        return $this->findAll;
    }

    protected function getMapper(): Mapper
    {
        return $this;
    }

    public function findByUserId(int $userId): ?Collection
    {
        $this->findByUserId->execute([
            'user_id' => $userId
        ]);
        $rows = $this->findByUserId->fetchAll();
        return new Collection($rows, $this->getMapper());
    }
}