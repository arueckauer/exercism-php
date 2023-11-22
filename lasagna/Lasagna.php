<?php

declare(strict_types=1);

class Lasagna
{
    public function expectedCookTime(): int
    {
        return 40;
    }

    public function remainingCookTime(int $elapsed_minutes): int
    {
        return $this->expectedCookTime() - $elapsed_minutes;
    }

    public function totalPreparationTime(int $layers_to_prep): int
    {
        return $layers_to_prep * 2;
    }

    public function totalElapsedTime(int $layers_to_prep, int $elapsed_minutes): int
    {
        return $this->totalPreparationTime($layers_to_prep) + $elapsed_minutes;
    }

    public function alarm(): string
    {
        return 'Ding!';
    }
}
