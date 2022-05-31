<?php

namespace app\exceptions;

class IncorrectLoginException extends \Exception
{

    public function __construct(string $message)
    {
        parent::__construct($message, 1001, null);
    }

    public function __toString(): string
    {
        return "Please check that input is correct. " . $this->getMessage();
    }


}