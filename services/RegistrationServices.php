<?php

namespace app\services;

use app\core\Application;
use app\core\Response;
use app\exceptions\FileSystemException;
use app\mappers\UserMapper;

class RegistrationServices
{
    public function canRegister(string $password, string $password2, string $email): bool
    {
        return $this->isPasswordsEquals($password, $password2) && $this->isMailNotExist($email);
    }

    public function isPasswordsEquals(mixed $password, mixed $password2): bool
    {
        return $password === $password2;
    }

    public function isMailNotExist(string $email): bool
    {
        $userMapper = new UserMapper();
        return !((bool)$userMapper->findByEmail($email));
    }

    public function writeBody(array $body)
    {
        try {
            $file = fopen("../body.txt", "w+");
            if ($file === false) {
                throw new FileSystemException("File not exist");
            }
            foreach ($body as $key => $value) {
                fwrite($file, $key . ":" . $value . PHP_EOL);
            }
            fclose($file);
        } catch (FileSystemException $e) {
            Application::$app->response->setStatusCode(Response::HTTP_SERVER_ERROR);
        }

    }
}