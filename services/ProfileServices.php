<?php

namespace app\services;

use app\core\Model;
use app\mappers\UserMapper;

class ProfileServices
{
    public function getUserById(): Model
    {
        $id = $_COOKIE['PHP_AUTH_USER_ID'];
        $userMapper = new UserMapper();
        $user = $userMapper->find($id);
        return $user;
    }

    public function editUser(string $newUsername, string $newPassword)
    {
        $userMapper = new UserMapper();
        $user = $this->getUserById();
        $user->setUsername($newUsername);
        $user->setPassword($newPassword);
        $userMapper->update($user);
    }
}