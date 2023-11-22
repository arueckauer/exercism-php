<?php

declare(strict_types=1);

class ProgramWindow
{
    public function __construct(
        public readonly int $x = 0,
        public readonly int $y = 0,
        public readonly int $width = 800,
        public readonly int $height = 600,
    ) {
    }

    public function resize(Size $size): self
    {
        return new self(
            $this->x,
            $this->y,
            $size->width,
            $size->height,
        );
    }

    public function move(Position $position): self
    {
        return new self(
            $position->x,
            $position->y,
            $this->width,
            $this->height,
        );
    }
}
