<?php

class Input
{
    private $errors = [];

    public function check($value, array $rules)
    {
        foreach ($rules as $rule) {
            $validator = $this->getValidator($rule);
            if (false === $validator->isValid($value)) {
                $this->errors[] = $validator->message;
            }
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    private function getValidator(string $rule): ValidatorInterface
    {
        return new (ucfirst($rule) . 'Validator');
    }
}
