<?php

declare(strict_types=1);

class BeerSong
{
    private static string $verse     = <<<VERSE
%1\$d %2\$s of beer on the wall, %1\$d %2\$s of beer.
Take %3\$s down and pass it around, %4\$s %5\$s of beer on the wall.
VERSE;
    private static string $lastVerse = <<<VERSE
No more bottles of beer on the wall, no more bottles of beer.
Go to the store and buy some more, 99 bottles of beer on the wall.
VERSE;

    public function verse(int $number): string
    {
        if ($number === 0) {
            return static::$lastVerse;
        }

        return sprintf(
            static::$verse,
            $number,
            $number === 1 ? 'bottle' : 'bottles',
            $number === 1 ? 'it' : 'one',
            $number === 1 ? 'no more' : $number - 1,
            $number === 2 ? 'bottle' : 'bottles',
        ) . "\n";
    }

    public function verses(int $start, int $finish): string
    {
        $verses = [];
        foreach (range($start, $finish) as $verseNumber) {
            $verses[] = $this->verse($verseNumber);
        }

        return implode("\n", $verses);
    }

    public function lyrics(): string
    {
        return $this->verses(99, 0);
    }
}
