<?php

namespace App\Exceptions;

use \Exception;

class EmailNotUniqueException extends Exception
{
    public function __construct($message = 'Email already exists.', $code = 409, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}