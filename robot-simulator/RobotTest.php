<?php

declare(strict_types = 1);

namespace ExercismTest\RobotSimulator;

use Exercism\RobotSimulator\Direction;
use Exercism\RobotSimulator\Position;
use Exercism\RobotSimulator\Robot;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class RobotTest extends TestCase
{
    public static function setUpBeforeClass() : void
    {
        require_once __DIR__ . '/../vendor/autoload.php';
    }

    public function testCreate() : void
    {
        $robot = new Robot(new Position(0, 0), new Direction(Direction::NORTH));
        $this->assertEquals([0, 0], $robot->position->toArray());
        $this->assertEquals(Direction::NORTH, $robot->direction->get());

        $robot = new Robot(new Position(-1, -1), new Direction(Direction::NORTH));
        $this->assertEquals([-1, -1], $robot->position->toArray());
        $this->assertEquals(Direction::NORTH, $robot->direction->get());
    }

    public function testTurnRight() : void
    {
        $robot      = new Robot(new Position(0, 0), new Direction(Direction::NORTH));
        $directions = [
            Direction::EAST,
            Direction::SOUTH,
            Direction::WEST,
            Direction::NORTH,
        ];

        foreach ($directions as $direction) {
            $robot->direction->turnRight();
            $this->assertEquals([0, 0], $robot->position->toArray());
            $this->assertEquals($direction, $robot->direction->get());
        }
    }

    public function testTurnLeft() : void
    {
        $robot      = new Robot(new Position(0, 0), new Direction(Direction::NORTH));
        $directions = [
            Direction::WEST,
            Direction::SOUTH,
            Direction::EAST,
            Direction::NORTH,
        ];

        foreach ($directions as $direction) {
            $robot->direction->turnLeft();
            $this->assertEquals([0, 0], $robot->position->toArray());
            $this->assertEquals($direction, $robot->direction->get());
        }
    }

    public function testAdvance() : void
    {
        $robot = new Robot(new Position(0, 0), new Direction(Direction::NORTH));
        $robot->position->advance($robot->direction);
        $this->assertEquals(Direction::NORTH, $robot->direction->get());
        $this->assertEquals([0, 1], $robot->position->toArray());

        $robot = new Robot(new Position(0, 0), new Direction(Direction::EAST));
        $robot->position->advance($robot->direction);
        $this->assertEquals(Direction::EAST, $robot->direction->get());
        $this->assertEquals([1, 0], $robot->position->toArray());

        $robot = new Robot(new Position(0, 0), new Direction(Direction::SOUTH));
        $robot->position->advance($robot->direction);
        $this->assertEquals(Direction::SOUTH, $robot->direction->get());
        $this->assertEquals([0, -1], $robot->position->toArray());

        $robot = new Robot(new Position(0, 0), new Direction(Direction::WEST));
        $robot->position->advance($robot->direction);
        $this->assertEquals(Direction::WEST, $robot->direction->get());
        $this->assertEquals([-1, 0], $robot->position->toArray());
    }

    public function testInstructions() : void
    {
        $robot = new Robot(new Position(0, 0), new Direction(Direction::NORTH));
        $robot->instructions('LAAARALA');
        $this->assertEquals([-4, 1], $robot->position->toArray());
        $this->assertEquals(Direction::WEST, $robot->direction->get());

        $robot = new Robot(new Position(2, -7), new Direction(Direction::EAST));
        $robot->instructions('RRAAAAALA');
        $this->assertEquals([-3, -8], $robot->position->toArray());
        $this->assertEquals(Direction::SOUTH, $robot->direction->get());

        $robot = new Robot(new Position(8, 4), new Direction(Direction::SOUTH));
        $robot->instructions('LAAARRRALLLL');
        $this->assertEquals([11, 5], $robot->position->toArray());
        $this->assertEquals(Direction::NORTH, $robot->direction->get());
    }

    public function testMalformedInstructions() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $robot = new Robot(new Position(0, 0), new Direction(Direction::NORTH));
        $robot->instructions('LARX');
    }
}
