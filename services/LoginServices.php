<?php

namespace app\services;

use app\core\Model;
use app\mappers\UserMapper;

class LoginServices
{
    public function canBeLogin(array $body): bool
    {
        $user = $this->isUserExists($body['email']);
        if ($user && $this->isPasswordEquals($body['password'], $user->getPassword())) {
            return true;
        }
        return false;
    }

    public function isUserExists(String $email): ?Model
    {
        try {
            $user = (new UserMapper())->findByEmail($email);
        } catch (\PDOException $e) {
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
            return true;
        } else {
            return false;
        }
    }

}