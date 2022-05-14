<?php

declare(strict_types=1);

namespace app\core;

abstract class Mapper
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Application::$app->database->pdo;
    }

    public function create(): Model
    {

    }

//    public function read(): Model
//    {
//
//    }

    public function update(Model $model): Model
    {
        $this->doUpdate($model);
    }

    public function delete(Model $model): void
    {
        $this->doDelete($model);
    }

    public function insert(Model $model): Model
    {
        return $this->doInsert($model);
    }

//    public function select()

    abstract protected function doInsert(Model $object): Model;
    abstract protected function doUpdate(Model $object): void;
    abstract protected function doDelete(Model $object): void;
    abstract protected function doCreate(array $object): Model;

    /**
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->pdo;
    }

}