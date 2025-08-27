<?php

declare(strict_types=1);

function findFewestCoins(array $coins, int $amount): array
{
    if ($amount === 0) {
        return [];
    }

    if ($amount < 0) {
        throw new InvalidArgumentException('Cannot make change for negative value');
    }

    if (min($coins) > $amount) {
        throw new InvalidArgumentException('No coins small enough to make change');
    }

    $table = [];
    for ($i = 1; $i <= $amount; $i++) {
        $table[$i] = findShortestCoinsPath($i, $coins, $table);
    }

    if ($table[$amount] === null) {
        throw new InvalidArgumentException('No combination can add up to target');
    }

    return $table[$amount];
}

function findShortestCoinsPath(int $amount, array $coins, array &$table): ?array
{
    if (isset($table[$amount])) {
        return $table[$amount];
    }

    $paths = [];
    foreach ($coins as $coin) {
        $remainingAmount = $amount;

        if ($coin > $remainingAmount) {
            continue;
        }

        if (isset($table[$remainingAmount])) {
            $paths[$coin] = $table[$remainingAmount];
            continue;
        }

        $paths[$coin][]   = $coin;
        $table[$coin]     = $paths[$coin];
        $remainingAmount -= $coin;

        if ($remainingAmount === 0) {
            break;
        }

        $path = findShortestCoinsPath($remainingAmount, $coins, $table);
        if ($path === null) {
            continue;
        }

        $paths[$coin] = [...$paths[$coin], ...$path];
    }

    if (
        count($paths) === 1
        && isset($paths[$amount])
    ) {
        return $paths[$amount];
    }

    $changeWithFewestCoins = [];
    foreach ($paths as $path) {
        if (
            count($changeWithFewestCoins) === 0
            || count($path) < count($changeWithFewestCoins)
        ) {
            $changeWithFewestCoins = $path;
        }
    }

    if ($remainingAmount !== 0 && count($changeWithFewestCoins) === 0) {
        return null;
    }

    return $changeWithFewestCoins;
}
