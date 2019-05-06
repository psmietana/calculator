<?php

namespace Exceptions;

class NegativeNumberException extends \InvalidArgumentException
{
    public function __construct(string $message = "", int $code = 0, \Throwable $previous = null)
    {
        parent::__construct('Number cannot be negative', $code, $previous);
    }
}
