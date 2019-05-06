<?php

class NonzeroValidator implements ValidatorInterface
{
    public $message;

    public function isValid($value): bool
    {
        if (0 === $value) {
            $this->message = sprintf(
                '%s should not be equal to zero',
                $value
            );

            return false;
        }

        return true;
    }
}
