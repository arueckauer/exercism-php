<?php

declare(strict_types=1);

namespace Exercism\RobotSimulator;

class Position
{
    private int $x;

    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function toArray(): array
    {
        return [
            $this->x,
            $this->y,
        ];
    }

    public function advance(Direction $direction): Position
    {
        switch ($direction->get()) {
            case Direction::NORTH:
                ++$this->y;
                break;

            case Direction::EAST:
                ++$this->x;
                break;

            case Direction::SOUTH:
                --$this->y;
                break;

            case Direction::WEST:
                --$this->x;
                break;
        }
        return $this;
    }
}
