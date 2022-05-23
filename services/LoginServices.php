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

    public function isPasswordEquals(String $enteredPassword, String $correctPassword): bool
    {
        if (strcmp($enteredPassword, $correctPassword) === 0) {
            echo "PASSWORD:EQUALS";
            return true;
        } else {
            return false;
        }
    }

}