<?php

namespace Components\Validation;

class AllowedActionValidator implements ValidatorInterface
{
    public $message;
    private static $allowedActions = [
        'sum',
        'difference',
        'product',
        'quotient',
        'factorial',
    ];

    public function isValid($value): bool
    {
        if (!in_array($value, self::$allowedActions)) {
            $this->message = sprintf(
                '%s action is not available. Allowed actions are %s.',
                $value,
                implode(', ', self::$allowedActions)
            );

            return false;
        }

        return true;
    }
}
