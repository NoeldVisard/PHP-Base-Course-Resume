<?php

declare(strict_types=1);

namespace app\services;

use app\core\Model;
use app\mappers\UserMapper;

class LoginServices
{
    public function login(array $body): bool
    {
        $user = $this->isUserExists($body['email']);
        if ($user && $this->isPasswordEquals($body['password'], $user->getPassword())) {
            $this->setCookie($user);
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

    public function setCookie(Model $user): void
    {
        setcookie('PHP_AUTH_STATE', "true", 0, '/');
        setcookie('PHP_AUTH_USER', $user->getUsername(), 0, '/');
        setcookie('PHP_AUTH_PASSWORD', $user->getPassword(), 0, '/');
        setcookie('PHP_AUTH_USER_ID', "".$user->getId(), 0, '/');
    }

}