<?php
declare(strict_types=1);

class Calculator implements CalculatorInterface
{
    public function sum(float $value1, float $value2): float
    {
        return $value1 + $value2;
    }

    public function difference(float $value1, float $value2): float
    {
        return $value1 - $value2;
    }

    public function product(float $value1, float $value2): float
    {
        return $value1 * $value2;
    }

    public function quotient(float $value1, float $value2): float
    {
        if (0 === $value2) {
            throw new DividingByZeroException();
        }

        return $value1 / $value2;
    }

    public function factorial(int $value): float
    {
        if (0 > $value) {
            throw new NegativeNumberException();
        }

        if (0 === $value) {
            return 1;
        }

        $result = 1;
        for ($i = $value; $i >= 2; $i--) {
            $result *= $i;
        }

        return $result;
    }
}
