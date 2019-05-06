<?php

namespace Components\Calculator;

interface CalculatorInterface
{
    public function sum(float $value1, float $value2): float;
    public function difference(float $value1, float $value2): float;
    public function product(float $value1, float $value2): float;
    public function quotient(float $value1, float $value2): float;
    public function factorial(int $value): float;
}
