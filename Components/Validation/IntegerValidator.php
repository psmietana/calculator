<?php

namespace Components\Validation;

class IntegerValidator implements ValidatorInterface
{
    public $message;

    public function isValid($value): bool
    {
        if ((int) $value != $value) {
            $this->message = sprintf(
                '%s is not valid integer',
                $value
            );

            return false;
        }

        return true;
    }
}
