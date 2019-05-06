<?php

namespace Components\Validation;

class NumericValidator implements ValidatorInterface
{
    public $message;

    public function isValid($value): bool
    {
        if (!is_numeric($value)) {
            $this->message = sprintf(
                '%s is not numeric',
                $value
            );

            return false;
        }

        return true;
    }
}
