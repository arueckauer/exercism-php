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

    rsort($coins);

    if ($coins[count($coins) - 1] > $amount) {
        throw new InvalidArgumentException('No coins small enough to make change');
    }

    try {
        $greedyChange = greedy($coins, $amount);
    } catch (InvalidArgumentException) {
    }

    try {
        $dynamicChange = dynamic($coins, $amount);
    } catch (InvalidArgumentException $invalidArgumentException) {
        if (isset($greedyChange)) {
            return $greedyChange;
        }

        throw $invalidArgumentException;
    }

    if (! isset($greedyChange)) {
        return $dynamicChange;
    }

    return count($greedyChange) < count($dynamicChange) ? $greedyChange : $dynamicChange;
}

function greedy(array $coins, int $amount): array
{
    $change = [];
    foreach ($coins as $coin) {
        while ($amount >= $coin) {
            $change[] = $coin;
            $amount  -= $coin;
        }
    }

    if ($amount > 0) {
        throw new InvalidArgumentException('No combination can add up to target');
    }

    sort($change);

    return $change;
}

function dynamic(array $coins, int $amount): array
{
    $table    = [];
    $table[0] = [];

    for ($i = 1; $i <= $amount; $i++) {
        $table[$i] = null;
        foreach ($coins as $coin) {
            if ($coin > $i) {
                continue;
            }

            $remainder = $i - $coin;
            if ($table[$remainder] === null) {
                continue;
            }

            $table[$i]   = $table[$remainder];
            $table[$i][] = $coin;
            break;
        }
    }

    if ($table[$amount] === null) {
        throw new InvalidArgumentException('No combination can add up to target');
    }

    sort($table[$amount]);

    return $table[$amount];
}
