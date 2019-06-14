<?php

declare(strict_types = 1);

namespace Exercism\RobotSimulator;

use InvalidArgumentException;

class Direction
{
    public const NORTH = 1;

    public const EAST = 2;

    public const SOUTH = 3;

    public const WEST = 4;

    private static $allowableDirections = [
        self::NORTH,
        self::EAST,
        self::SOUTH,
        self::WEST,
    ];

    private $direction;

    public function __construct(int $direction)
    {
        $this->set($direction);
    }

    public function turnLeft() : void
    {
        --$this->direction;

        if (0 === $this->direction) {
            $this->direction = 4;
        }
    }

    public function turnRight() : void
    {
        ++$this->direction;

        if (5 === $this->direction) {
            $this->direction = 1;
        }
    }

    public function get() : int
    {
        return $this->direction;
    }

    public function set(int $direction) : Direction
    {
        if (! in_array($direction, static::$allowableDirections, true)) {
            throw new InvalidArgumentException('Given direction is not valid.');
        }

        $this->direction = $direction;

        return $this;
    }
}
