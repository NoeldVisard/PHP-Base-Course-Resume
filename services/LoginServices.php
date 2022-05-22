<?php

namespace app\services;

use app\core\Model;
use app\mappers\UserMapper;

class LoginServices
{
    public function isUserExists(String $email): ?Model
    {
        try {
            $user = (new UserMapper())->findByEmail($email);
        } catch (\PDOException $e) {
            $e->getMessage();
            return null;
        }
        if ($user) {
            return $user;
        } else {
            return null;
        }
    }

}