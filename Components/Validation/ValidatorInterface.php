<?php

namespace Components\Validation;

interface ValidatorInterface
{
    public function isValid($value): bool;
}
