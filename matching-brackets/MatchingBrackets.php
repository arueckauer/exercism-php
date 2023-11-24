<?php

declare(strict_types=1);

function brackets_match(string $input): bool
{
    $closingBrackets = [];
    foreach (str_split($input) as $character) {
        if (in_array($character, ['[', '{', '('])) {
            $closingBrackets[] = match ($character) {
                '[' => ']',
                '{' => '}',
                '(' => ')',
            };
        } elseif (in_array($character, [']', '}', ')'])) {
            if (array_pop($closingBrackets) !== $character) {
                return false;
            }
        }
    }

    return count($closingBrackets) === 0;
}
