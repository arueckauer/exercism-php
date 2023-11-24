<?php

declare(strict_types=1);

function twoFer(string $name = 'you'): string
{
    return sprintf(
        'One for %s, one for me.',
        $name
    );
}
