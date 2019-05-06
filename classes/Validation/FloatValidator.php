<?php

class FloatValidator implements ValidatorInterface
{
    public $message;

    public function isValid($value): bool
    {
        if (!is_float($value)) {
            $this->message = sprintf(
                '%s is not valid float',
                $value
            );

            return false;
        }

        return true;
    }
}
