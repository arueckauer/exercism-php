<?php

declare(strict_types=1);

namespace Exercism\RobotSimulator;

use InvalidArgumentException;

use function str_split;

class Robot
{
    public Position $position;

    public Direction $direction;

    public function __construct(Position $position, Direction $direction)
    {
        $this->position  = $position;
        $this->direction = $direction;
    }

    public function instructions(string $path): void
    {
        foreach (str_split($path) as $direction) {
            switch ($direction) {
                case 'A':
                    $this->position->advance($this->direction);
                    break;

                case 'L':
                    $this->direction->turnLeft();
                    break;

                case 'R':
                    $this->direction->turnRight();
                    break;

                default:
                    throw new InvalidArgumentException("Provided instruction '$direction' is not supported.'");
            }
        }
    }
}
