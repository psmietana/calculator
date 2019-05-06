<?php

class IntegerValidator implements ValidatorInterface
{
    public $message;

    public function isValid($value): bool
    {
        if (!is_int($value)) {
            $this->message = sprintf(
                '%s is not valid integer',
                $value
            );

            return false;
        }

        return true;
    }
}
