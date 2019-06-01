<?php

namespace App\Exceptions;

use \Exception;

class EmailNotValidException extends Exception
{
    public function __construct($message = 'Email not valid.', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}