<?php

declare(strict_types=1);

class HighScores
{
    /** @var int[] */
    public array $scores;
    public int $latest;
    public int $personalBest;
    public array $personalTopThree;

    public function __construct(array $scores)
    {
        $this->scores       = $scores;
        $this->latest       = end($this->scores);
        $this->personalBest = max($this->scores);

        $scores = $this->scores;
        rsort($scores);
        $this->personalTopThree = array_slice($scores, 0, 3);
    }
}
