<?php

declare(strict_types=1);

use JetBrains\PhpStorm\Pure;

class Team
{
    public string $name;
    private int $matchesPlayed = 0;
    private int $matchesWon    = 0;
    private int $matchesDrawn  = 0;
    private int $matchesLost   = 0;
    private int $points        = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function play(): void
    {
        ++$this->matchesPlayed;
    }

    public function win(): void
    {
        ++$this->matchesWon;
        $this->points += 3;
    }

    public function draw(): void
    {
        ++$this->matchesDrawn;
        ++$this->points;
    }

    public function loose(): void
    {
        ++$this->matchesLost;
    }

    public function points(): int
    {
        return $this->points;
    }

    #[Pure]
    public function toString(): string
    {
        return sprintf(
            '%-30s | %2s | %2s | %2s | %2s | %2s',
            $this->name,
            $this->matchesPlayed,
            $this->matchesWon,
            $this->matchesDrawn,
            $this->matchesLost,
            $this->points
        );
    }
}
