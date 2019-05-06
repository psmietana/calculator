<?php

class Input
{
    private static $errors = [];

    public static function check($value, array $rules)
    {
        foreach ($rules as $rule) {
            $validator = self::getValidator($rule);
            if (false === $validator->isValid($value)) {
                self::$errors[] = $validator->message;
            }
        }
    }

    public static function escape($value)
    {
        return htmlspecialchars($value);
    }

    public static function getErrors(): array
    {
        return self::$errors;
    }

    private static function getValidator(string $rule): ValidatorInterface
    {
        return new (ucfirst($rule) . 'Validator');
    }
}
