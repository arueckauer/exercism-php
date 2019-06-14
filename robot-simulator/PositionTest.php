<?php

declare(strict_types = 1);

namespace ExercismTest\RobotSimulator;

use Exercism\RobotSimulator\Direction;
use Exercism\RobotSimulator\Position;
use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once __DIR__ . '/../vendor/autoload.php';
    }

    public function testToArrayOnBasePosition() : void
    {
        $position = new Position(0, 0);
        $this->assertEquals([0, 0], $position->toArray());
    }

    public function testToArrayOnOuterField() : void
    {
        $position = new Position(999, -654);
        $this->assertEquals([999, -654], $position->toArray());
    }

    public function testAdvanceNorthByOne() : void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::NORTH));
        $this->assertEquals([0, 1], $position->toArray());
    }

    public function testAdvanceNorthByFive() : void
    {
        $position = new Position(3, 0);
        for ($i = 0; $i < 5; $i++) {
            $position->advance(new Direction(Direction::NORTH));
        }

        $this->assertEquals([3, 5], $position->toArray());
    }

    public function testAdvanceNorthByHundred() : void
    {
        $position = new Position(9, -97);
        for ($i = 0; $i < 100; $i++) {
            $position->advance(new Direction(Direction::NORTH));
        }

        $this->assertEquals([9, 3], $position->toArray());
    }

    public function testAdvanceEastByOne() : void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::EAST));
        $this->assertEquals([1, 0], $position->toArray());
    }

    public function testAdvanceEastByFive() : void
    {
        $position = new Position(0, 3);
        for ($i = 0; $i < 5; $i++) {
            $position->advance(new Direction(Direction::EAST));
        }

        $this->assertEquals([5, 3], $position->toArray());
    }

    public function testAdvanceEastByHundred() : void
    {
        $position = new Position(-97, 9);
        for ($i = 0; $i < 100; $i++) {
            $position->advance(new Direction(Direction::EAST));
        }

        $this->assertEquals([3, 9], $position->toArray());
    }

    public function testAdvanceSouthByOne() : void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::SOUTH));
        $this->assertEquals([0, -1], $position->toArray());
    }

    public function testAdvanceSouthByFive() : void
    {
        $position = new Position(3, 0);
        for ($i = 0; $i < 5; $i++) {
            $position->advance(new Direction(Direction::SOUTH));
        }

        $this->assertEquals([3, -5], $position->toArray());
    }

    public function testAdvanceSouthByHundred() : void
    {
        $position = new Position(9, 97);
        for ($i = 0; $i < 100; $i++) {
            $position->advance(new Direction(Direction::SOUTH));
        }

        $this->assertEquals([9, -3], $position->toArray());
    }

    public function testAdvanceWestByOne() : void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::WEST));
        $this->assertEquals([-1, 0], $position->toArray());
    }

    public function testAdvanceWestByFive() : void
    {
        $position = new Position(0, 3);
        for ($i = 0; $i < 5; $i++) {
            $position->advance(new Direction(Direction::WEST));
        }

        $this->assertEquals([-5, 3], $position->toArray());
    }

    public function testAdvanceWestByHundred() : void
    {
        $position = new Position(97, 9);
        for ($i = 0; $i < 100; $i++) {
            $position->advance(new Direction(Direction::WEST));
        }

        $this->assertEquals([-3, 9], $position->toArray());
    }

    public function testAdvanceOnceInCircleClockwise() : void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::NORTH));
        $position->advance(new Direction(Direction::EAST));
        $position->advance(new Direction(Direction::SOUTH));
        $position->advance(new Direction(Direction::WEST));
        $this->assertEquals([0, 0], $position->toArray());
    }

    public function testAdvanceOnceInCircleCounterClockwise() : void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::NORTH));
        $position->advance(new Direction(Direction::WEST));
        $position->advance(new Direction(Direction::SOUTH));
        $position->advance(new Direction(Direction::EAST));
        $this->assertEquals([0, 0], $position->toArray());
    }
}
