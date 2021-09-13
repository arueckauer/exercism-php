<?php

declare(strict_types=1);

namespace ExercismTest\RobotSimulator;

use Exercism\RobotSimulator\Direction;
use Exercism\RobotSimulator\Position;
use PHPUnit\Framework\TestCase;

use function dirname;

class PositionTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once dirname(__DIR__) . '/vendor/autoload.php';
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::toArray
     */
    public function test_to_array_on_base_position(): void
    {
        $position = new Position(0, 0);
        $this->assertEquals([0, 0], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::toArray
     */
    public function test_to_array_on_outer_field(): void
    {
        $position = new Position(999, -654);
        $this->assertEquals([999, -654], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_north_by_one(): void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::NORTH));
        $this->assertEquals([0, 1], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_north_by_five(): void
    {
        $position = new Position(3, 0);
        for ($i = 0; $i < 5; $i++) {
            $position->advance(new Direction(Direction::NORTH));
        }

        $this->assertEquals([3, 5], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_north_by_hundred(): void
    {
        $position = new Position(9, -97);
        for ($i = 0; $i < 100; $i++) {
            $position->advance(new Direction(Direction::NORTH));
        }

        $this->assertEquals([9, 3], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_east_by_one(): void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::EAST));
        $this->assertEquals([1, 0], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_east_by_five(): void
    {
        $position = new Position(0, 3);
        for ($i = 0; $i < 5; $i++) {
            $position->advance(new Direction(Direction::EAST));
        }

        $this->assertEquals([5, 3], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_east_by_hundred(): void
    {
        $position = new Position(-97, 9);
        for ($i = 0; $i < 100; $i++) {
            $position->advance(new Direction(Direction::EAST));
        }

        $this->assertEquals([3, 9], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_south_by_one(): void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::SOUTH));
        $this->assertEquals([0, -1], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_south_by_five(): void
    {
        $position = new Position(3, 0);
        for ($i = 0; $i < 5; $i++) {
            $position->advance(new Direction(Direction::SOUTH));
        }

        $this->assertEquals([3, -5], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_south_by_hundred(): void
    {
        $position = new Position(9, 97);
        for ($i = 0; $i < 100; $i++) {
            $position->advance(new Direction(Direction::SOUTH));
        }

        $this->assertEquals([9, -3], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_west_by_one(): void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::WEST));
        $this->assertEquals([-1, 0], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_west_by_five(): void
    {
        $position = new Position(0, 3);
        for ($i = 0; $i < 5; $i++) {
            $position->advance(new Direction(Direction::WEST));
        }

        $this->assertEquals([-5, 3], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_west_by_hundred(): void
    {
        $position = new Position(97, 9);
        for ($i = 0; $i < 100; $i++) {
            $position->advance(new Direction(Direction::WEST));
        }

        $this->assertEquals([-3, 9], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_once_in_circle_clockwise(): void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::NORTH));
        $position->advance(new Direction(Direction::EAST));
        $position->advance(new Direction(Direction::SOUTH));
        $position->advance(new Direction(Direction::WEST));
        $this->assertEquals([0, 0], $position->toArray());
    }

    /**
     * @covers \Exercism\RobotSimulator\Position::advance
     */
    public function test_advance_once_in_circle_counter_clockwise(): void
    {
        $position = new Position(0, 0);
        $position->advance(new Direction(Direction::NORTH));
        $position->advance(new Direction(Direction::WEST));
        $position->advance(new Direction(Direction::SOUTH));
        $position->advance(new Direction(Direction::EAST));
        $this->assertEquals([0, 0], $position->toArray());
    }
}
