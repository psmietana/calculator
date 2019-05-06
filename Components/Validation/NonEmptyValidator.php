<?php

namespace Components\Validation;

class NonEmptyValidator implements ValidatorInterface
{
    public $message;

    public function isValid($value): bool
    {
        if (empty($value)) {
            $this->message = 'Action cannot be empty';

            return false;
        }

        return true;
    }
}
