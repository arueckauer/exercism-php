<?php

declare(strict_types=1);

class AnnalynsInfiltration
{
    public function canFastAttack(bool $is_knight_awake): bool
    {
        return ! $is_knight_awake;
    }

    public function canSpy(
        bool $is_knight_awake,
        bool $is_archer_awake,
        bool $is_prisoner_awake,
    ): bool {
        return $is_prisoner_awake
            || $is_knight_awake
            || $is_archer_awake;
    }

    public function canSignal(
        bool $is_archer_awake,
        bool $is_prisoner_awake,
    ): bool {
        return ! $is_archer_awake && $is_prisoner_awake;
    }

    public function canLiberate(
        bool $is_knight_awake,
        bool $is_archer_awake,
        bool $is_prisoner_awake,
        bool $is_dog_present,
    ): bool {
        return ($is_dog_present && ! $is_archer_awake)
            || ($is_prisoner_awake && ! $is_archer_awake && ! $is_knight_awake);
    }
}
