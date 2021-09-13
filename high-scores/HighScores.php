<?php

declare(strict_types=1);

class HighScores
{
    /** @psalm-var non-empty-array<int, int> */
    private array $scores;

    /**
     * @psalm-param non-empty-array<int, int> $bar
     */
    public function __construct(array $scores)
    {
        $this->scores = $scores;
    }

    public function scores(): array
    {
        return $this->scores;
    }

    public function latest(): int
    {
        return end($this->scores);
    }

    public function personalBest(): int
    {
        return max($this->scores);
    }

    public function personalTopThree(): array
    {
        $scores = $this->scores;
        rsort($scores);

        return array_slice($scores, 0, 3);
    }
}
