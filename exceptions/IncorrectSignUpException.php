<?php

namespace app\exceptions;

class IncorrectSignUpException extends \Exception
{
    /**
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message, 1002, null);
    }

    public function __toString(): string
    {
        return "Please check is the password entered correctly or try to change mail. " . $this->getMessage();
    }
}