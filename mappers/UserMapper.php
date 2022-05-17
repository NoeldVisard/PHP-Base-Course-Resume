<?php

declare(strict_types=1);

namespace app\mappers;

use app\core\Model;
use app\core\Mapper;

class UserMapper extends Mapper
{
    private \PDOStatement $update;
    private \PDOStatement $delete;
    private \PDOStatement $insert;

    public function __construct()
    {
        parent:: __construct();
//        $this->select = $this->getPdo()->prepare("SELECT * FROM \"user\" WHERE id = ?");
        $this->update = $this->getPdo()->prepare("UPDATE \"user\" SET username = :username, email = :email, password = :password WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM \"user\" WHERE id = :id");
        $this->insert = $this->getPdo()->prepare("INSERT INTO \"user\" (username, email, password) VALUES (:username, :email, :password)");
    }

    protected function doInsert(Model $object): Model
    {
        $this->insert->execute(
            [
                'username' => $object->getUsername(),
                'email' => $object->getEmail(),
                'password' => $object->getPassword(),
            ]
        );

        $rowId = $this->getPdo()->lastInsertId();
        $object->setId((int)$rowId);
        return $object;
    }

    protected function doUpdate(Model $object): void
    {
        // TODO: Implement doUpdate() method.
    }

    protected function doDelete(Model $object): void
    {
        // TODO: Implement doDelete() method.
    }

    protected function doCreate(array $object): Model
    {
        // TODO: Implement doCreate() method.
    }
}