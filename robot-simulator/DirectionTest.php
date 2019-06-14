<?php

declare(strict_types = 1);

namespace ExercismTest\RobotSimulator;

use Exercism\RobotSimulator\Direction;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once __DIR__ . '/../vendor/autoload.php';
    }

    public function testNorth() : void
    {
        $direction = new Direction(Direction::NORTH);
        $this->assertEquals(Direction::NORTH, $direction->get());
    }

    public function testEast() : void
    {
        $direction = new Direction(Direction::EAST);
        $this->assertEquals(Direction::EAST, $direction->get());
    }

    public function testSouth() : void
    {
        $direction = new Direction(Direction::SOUTH);
        $this->assertEquals(Direction::SOUTH, $direction->get());
    }

    public function testWest() : void
    {
        $direction = new Direction(Direction::WEST);
        $this->assertEquals(Direction::WEST, $direction->get());
    }

    public function testInvalidDirectionZero() : void
    {
        $this->expectException(InvalidArgumentException::class);
        new Direction(0);
    }

    public function testInvalidDirectionMinusOne() : void
    {
        $this->expectException(InvalidArgumentException::class);
        new Direction(-1);
    }

    public function testInvalidDirectionFive() : void
    {
        $this->expectException(InvalidArgumentException::class);
        new Direction(5);
    }
}
