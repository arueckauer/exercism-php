<?php

declare(strict_types=1);

namespace ExercismTest\HighScores;

use Exercism\HighScores\HighScores;
use PHPUnit\Framework\TestCase;

class HighScoresTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        require_once 'HighScores.php';
    }

    /**
     * @covers \Exercism\HighScores\HighScores::scores
     */
    public function test_list_of_scores(): void
    {
        $input = [30, 50, 20, 70];
        self::assertSame([30, 50, 20, 70], (new HighScores($input))->scores());
    }

    /**
     * @covers \Exercism\HighScores\HighScores::latest
     */
    public function test_latest_score(): void
    {
        $input = [100, 0, 90, 30];
        self::assertSame(30, (new HighScores($input))->latest());
    }

    /**
     * @covers \Exercism\HighScores\HighScores::personalBest
     */
    public function test_personalBest(): void
    {
        $input = [40, 100, 70];
        self::assertSame(100, (new HighScores($input))->personalBest());
    }

    /**
     * @covers \Exercism\HighScores\HighScores::personalTopThree
     */
    public function test_personalTopThree_from_a_list_of_scores(): void
    {
        $input = [10, 30, 90, 30, 100, 20, 10, 0, 30, 40, 40, 70, 70];
        self::assertSame([100, 90, 70], (new HighScores($input))->personalTopThree());
    }

    /**
     * @covers \Exercism\HighScores\HighScores::personalTopThree
     */
    public function test_personalTopThree_highest_to_lowest(): void
    {
        $input = [20, 10, 30];
        self::assertSame([30, 20, 10], (new HighScores($input))->personalTopThree());
    }

    /**
     * @covers \Exercism\HighScores\HighScores::personalTopThree
     */
    public function test_personalTopThree_when_there_is_a_tie(): void
    {
        $input = [40, 20, 40, 30];
        self::assertSame([40, 40, 30], (new HighScores($input))->personalTopThree());
    }

    /**
     * @covers \Exercism\HighScores\HighScores::personalTopThree
     */
    public function test_personalTopThree_when_there_are_less_than_3(): void
    {
        $input = [30, 70];
        self::assertSame([70, 30], (new HighScores($input))->personalTopThree());
    }

    /**
     * @covers \Exercism\HighScores\HighScores::personalTopThree
     */
    public function test_personalTopThree_when_there_is_only_one(): void
    {
        $input = [40];
        self::assertSame([40], (new HighScores($input))->personalTopThree());
    }

    /**
     * @covers \Exercism\HighScores\HighScores::latest
     */
    public function test_latest_score_does_not_change_after_getting_personal_best(): void
    {
        $input     = [20, 10, 30, 3, 2, 1];
        $highScore = new HighScores($input);

        self::assertSame(30, $highScore->personalBest());
        self::assertSame(1, $highScore->latest());
    }

    /**
     * @covers \Exercism\HighScores\HighScores::latest
     */
    public function test_latest_score_does_not_change_after_getting_personalTopThree(): void
    {
        $input     = [20, 100, 30, 90, 2, 70];
        $highScore = new HighScores($input);

        self::assertSame([100, 90, 70], $highScore->personalTopThree());
        self::assertSame(70, $highScore->latest());
    }
}
