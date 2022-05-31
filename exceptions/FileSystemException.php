<?php

namespace app\exceptions;

class FileSystemException extends \Exception
{

    /**
     * @param string $message
     */
    public function __construct(string $message)
    {
    }
}