<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\exceptions\FileSystemException;
use app\mappers\UserMapper;
use app\models\User;

class RegistrationController extends Controller
{
    public function registration(Request $request)
    {
        $body = $request->getBody();
        if ($this->isPasswordsEquals($body["password"], $body["password2"]) && $this->isMailNotExist($body["email"])) {
            try {
                $this->writeBody($body);
            } catch (FileSystemException $e) {
                Application::$app->response->setStatusCode(Response::HTTP_SERVER_ERROR);
            }
//             Old version
//            $registerModel = (new User())->assign($body);
//            $registerModel->save();
            $user = new User($body['username'], $body['email'], $body['password']);
            $mapper = new UserMapper();
            $mapper->insert($user);

//             Examples
//            $user = $mapper->find(11);
//            var_dump($user);

//            $rows = $mapper->findAll()->getNextRow();
//            var_dump($rows->current());
        }
    }

    public function registrationPage()
    {
        $template = 'registration';
        $this->render($template);
    }

    private function writeBody(array $body)
    {
        $file = fopen("../body.txt", "w+");
        if ($file === false) {
            throw new FileSystemException("File not exist");
        }
        foreach ($body as $key => $value) {
            fwrite($file, $key . ":" . $value . PHP_EOL);
        }
        fclose($file);

        echo '<pre>';
        var_dump($body);
        echo '</pre>';

    }

    private function isPasswordsEquals(string $password, string $password2) : bool
    {
        return $password === $password2;
    }

    private function isMailNotExist(mixed $email): bool
    {
        // TODO: isMailNotExist in database
        return true;
    }
}
