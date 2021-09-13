<?php

declare(strict_types=1);

namespace ExercismTest\RobotSimulator;

use Exercism\RobotSimulator\Direction;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

use function dirname;

class DirectionTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once dirname(__DIR__) . '/vendor/autoload.php';
    }

    /**
     * @covers \Exercism\RobotSimulator\Direction::
     */
    public function test_north(): void
    {
        $direction = new Direction(Direction::NORTH);
        $this->assertEquals(Direction::NORTH, $direction->get());
    }

    /**
     * @covers \Exercism\RobotSimulator\Direction::__construct
     */
    public function test_east(): void
    {
        $direction = new Direction(Direction::EAST);
        $this->assertEquals(Direction::EAST, $direction->get());
    }

    /**
     * @covers \Exercism\RobotSimulator\Direction::__construct
     */
    public function test_south(): void
    {
        $direction = new Direction(Direction::SOUTH);
        $this->assertEquals(Direction::SOUTH, $direction->get());
    }

    /**
     * @covers \Exercism\RobotSimulator\Direction::__construct
     */
    public function test_west(): void
    {
        $direction = new Direction(Direction::WEST);
        $this->assertEquals(Direction::WEST, $direction->get());
    }

    /**
     * @covers \Exercism\RobotSimulator\Direction::__construct
     */
    public function test_invalid_direction_zero(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Direction(0);
    }

    /**
     * @covers \Exercism\RobotSimulator\Direction::__construct
     */
    public function test_invalid_direction_minus_one(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Direction(-1);
    }

    /**
     * @covers \Exercism\RobotSimulator\Direction::__construct
     */
    public function test_invalid_direction_five(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Direction(5);
    }
}
