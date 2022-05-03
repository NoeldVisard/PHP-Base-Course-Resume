<?php

namespace app\exceptions;

class FileSystemException extends \Exception
{

    /**
     * @param string $string
     */
    public function __construct(string $string)
    {
    }
}