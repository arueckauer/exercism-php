<?php

declare(strict_types=1);

namespace ExcercismTest\ReverseString;

use PHPUnit\Framework\TestCase;

use function Excercism\ReverseString\reverseString;

class ReverseStringTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'ReverseString.php';
    }

    /**
     * @covers ::reverseString
     */
    public function test_empty_string(): void
    {
        $this->assertEquals('', reverseString(''));
    }

    /**
     * @covers ::reverseString
     */
    public function test_word(): void
    {
        $this->assertEquals('tobor', reverseString('robot'));
    }

    /**
     * @covers ::reverseString
     */
    public function test_capitalized_word(): void
    {
        $this->assertEquals('nemaR', reverseString('Ramen'));
    }

    /**
     * @covers ::reverseString
     */
    public function test_sentence_with_punctuation(): void
    {
        $this->assertEquals("!yrgnuh m'I", reverseString("I'm hungry!"));
    }

    /**
     * @covers ::reverseString
     */
    public function test_palindrome(): void
    {
        $this->assertEquals('racecar', reverseString('racecar'));
    }

    /**
     * @covers ::reverseString
     */
    public function test_even_sized_word(): void
    {
        $this->assertEquals('reward', reverseString('drawer'));
    }
}
