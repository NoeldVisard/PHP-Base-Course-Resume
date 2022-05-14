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
        $this->update = $this->getPdo()->prepare("UPDATE \"user\" SET username = :username, email = :email WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM \"user\" WHERE id = :id");
        $insertSql = "INSERT INTO \"user\" (username, email) VALUES (:username, :email)";
        $this->insert = $this->getPdo()->prepare($insertSql);
    }

    protected function doInsert(Model $object): Model
    {
        $this->insert->execute(
            [
                'username' => $object->getUsername(),
                'email' => $object->getEmail()
            ]
        );

        $object->setId((int)$rowId = $this->getPdo()->lastInsertId());
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