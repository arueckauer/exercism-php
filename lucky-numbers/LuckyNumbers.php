<?php

declare(strict_types=1);

class LuckyNumbers
{
    public function sumUp(array $digitsOfNumber1, array $digitsOfNumber2): int
    {
        return (int) implode('', $digitsOfNumber1) + (int) implode('', $digitsOfNumber2);
    }

    public function isPalindrome(int $number): bool
    {
        $string = (string) $number;
        return $string === strrev($string);
    }

    public function validate(string $input): string
    {
        if ($input === '') {
            return 'Required field';
        }

        if ((int) $input <= 0) {
            return 'Must be a whole number larger than 0';
        }

        return '';
    }
}
