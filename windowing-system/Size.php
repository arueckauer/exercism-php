<?php

declare(strict_types=1);

class Size
{
    public function __construct(
        public readonly int $height = 764,
        public readonly int $width = 1024,
    ) {
    }
}
