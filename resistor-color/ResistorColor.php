<?php

declare(strict_types=1);

const COLORS = [
    'black',
    'brown',
    'red',
    'orange',
    'yellow',
    'green',
    'blue',
    'violet',
    'grey',
    'white',
];

function colorCode(string $color): int
{
    $code = array_search($color, COLORS, true);

    if (false !== $code) {
        return $code;
    }

    throw new InvalidArgumentException(sprintf(
        'Given color "%s" is not supported.',
        $color
    ));
}
