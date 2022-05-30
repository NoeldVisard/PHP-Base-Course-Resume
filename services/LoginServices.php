<?php

namespace app\services;

use app\core\Model;
use app\mappers\UserMapper;

class LoginServices
{
    public function canLogin(array $body): bool
    {
        $user = $this->isUserExists($body['email']);
        return ($user && $this->isPasswordEquals($body['password'], $user->getPassword()));
    }

    public function isUserExists(String $email): ?Model
    {
        try {
            return (new UserMapper())->findByEmail($email);
        } catch (\PDOException $e) {
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