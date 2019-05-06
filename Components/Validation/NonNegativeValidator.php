<?php

namespace Components\Validation;

class NonNegativeValidator implements ValidatorInterface
{
    public $message;

    public function isValid($value): bool
    {
        if (0 > $value) {
            $this->message = sprintf(
                '%s is not positive number',
                $value
            );

            return false;
        }

        return true;
    }
}
