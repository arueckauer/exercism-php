<?php

declare(strict_types=1);

namespace ExcercismTest\ResistorColor;

use PHPUnit\Framework\TestCase;

class ResistorColorTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ResistorColor.php';
    }

    /**
     * @covers ::colorCode
     */
    public function test_black_color_code(): void
    {
        self::assertSame(0, colorCode('black'));
    }

    /**
     * @covers ::colorCode
     */
    public function test_orange_color_code(): void
    {
        self::assertSame(3, colorCode('orange'));
    }

    /**
     * @covers ::colorCode
     */
    public function test_white_color_code(): void
    {
        self::assertSame(9, colorCode('white'));
    }

    /**
     * @covers ::colorCode
     */
    public function test_colors(): void
    {
        self::assertSame(COLORS, [
            'black',
            'brown',
            'red',
            'orange',
            'yellow',
            'green',
            'blue',
            'violet',
            'grey',
            'white',
        ]);
    }
}
