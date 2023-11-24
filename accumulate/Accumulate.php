<?php

declare(strict_types=1);

function accumulate(array $input, callable $accumulator): array
{
    $result = [];
    foreach ($input as $value) {
        $result[] = $accumulator($value);
    }

    return $result;
}
