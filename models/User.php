<?php

declare(strict_types=1);

namespace app\models;

use app\core\DbModel;

class User extends DbModel
{
    public function getTableName(): string
    {
        return "user";
    }

    public function getAttributes(): array
    {
        return ['username', 'email', 'password'];
    }
}
