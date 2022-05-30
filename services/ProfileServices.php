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
}