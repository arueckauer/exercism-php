<?php

declare(strict_types=1);

function square(int $number): string
{
    if ($number < 1 || $number > 64) {
        throw new InvalidArgumentException('Square must be between 1 and 64');
    }

    return sprintf('%u', squareRaw($number));
}

function squareRaw(int $number): int
{
    return 1 << ($number - 1);
}

function total(): string
{
    $total = 0;
    for ($i = 1; $i <= 64; $i++) {
        $total += squareRaw($i);
    }

    return sprintf('%u', $total);
}
