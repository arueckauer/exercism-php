<?php

declare(strict_types=1);

class Position
{
    public function __construct(
        public readonly int $y = 0,
        public readonly int $x = 0,
    ) {
    }
}
