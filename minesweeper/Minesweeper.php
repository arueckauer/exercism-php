<?php

declare(strict_types=1);

function solve(string $board): string
{
    $lines = explode("\n", $board);
    array_shift($lines);
    array_pop($lines);

    validate($lines);

    return addMineHints($lines);
}

function validate(array $lines): void
{
    validateLineLength($lines);
    validateMinimumSquares($lines);
    validateTopOrBottomBorder($lines[0]);
    validateTopOrBottomBorder($lines[count($lines) - 1]);
    validateMiddleBorders($lines);
}

function validateLineLength(array $lines): void
{
    $lineLength = strlen($lines[0]);
    foreach ($lines as $line) {
        if (strlen($line) !== $lineLength) {
            throw new InvalidArgumentException('All lines must be the same length');
        }
    }
}

function validateMinimumSquares(array $lines): void
{
    if (count($lines) < 4 && strlen($lines[0]) < 4) {
        throw new InvalidArgumentException('Board must have at least 2 squares in either dimension');
    }
}

function validateTopOrBottomBorder(string $line): void
{
    if ($line[0] !== '+' || $line[strlen($line) - 1] !== '+') {
        throw new InvalidArgumentException('Top/bottom row must start and end with +');
    }
    if (preg_match('/[^-]/', substr($line, 1, -1))) {
        throw new InvalidArgumentException('Top/bottom row must contain only -');
    }
}

function validateMiddleBorders(array $lines): void
{
    array_shift($lines);
    array_pop($lines);

    foreach ($lines as $line) {
        if ($line[0] !== '|' || $line[strlen($line) - 1] !== '|') {
            throw new InvalidArgumentException('Middle rows must start and end with |');
        }
        if (preg_match('/[^ *|]/', substr($line, 1, -1))) {
            throw new InvalidArgumentException('Middle rows must contain only space, * and |');
        }
    }
}

function addMineHints(array $lines): string
{
    $newLines[] = '';
    foreach ($lines as $lineNumber => $line) {
        $newLine = '';
        foreach (str_split($line) as $columnNumber => $char) {
            if (in_array($char, ['*', '+', '-', '|'])) {
                $newLine .= $char;
            } else {
                $newLine .= countMines($lines, $lineNumber, $columnNumber);
            }
        }
        $newLines[] = $newLine;
    }
    $newLines[] = '';

    return implode("\n", $newLines);
}

function countMines(array $lines, int $lineNumber, int $columnNumber): string
{
    $count = 0;
    for ($i = $lineNumber - 1; $i <= $lineNumber + 1; $i++) {
        for ($j = $columnNumber - 1; $j <= $columnNumber + 1; $j++) {
            if (isset($lines[$i][$j]) && $lines[$i][$j] === '*') {
                $count++;
            }
        }
    }

    return $count === 0 ? ' ' : (string) $count;
}
