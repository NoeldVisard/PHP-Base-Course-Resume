<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\exceptions\FileSystemException;

class RegistrationController extends Controller
{
    public function handleRegistration(Request $request)
    {
        $body = $request->getBody();
        if ($this->isPasswordsEquals($body["password"], $body["password2"]) && $this->isMailNotExist($body["email"])) {
            try {
                $this->writeBody($body);
            } catch (FileSystemException $e) {
                Application::$app->response->setStatusCode(Response::HTTP_SERVER_ERROR);
            }
            exit;
        }
    }

    public function registration()
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

    private function isMailNotExist(mixed $email)
    {
        // TODO: isMailNotExist in database
    }
}
