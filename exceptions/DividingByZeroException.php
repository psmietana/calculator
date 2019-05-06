<?php

class DividingByZeroException extends InvalidArgumentException
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct('Cannot divide by zero', $code, $previous);
    }
}
