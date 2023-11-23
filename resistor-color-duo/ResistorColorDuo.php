<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class ResistorColorDuo
{
    public function getColorsValue(array $colors): int
    {
        $firstNumber  = ResistorColorNumber::fromName($colors[0]);
        $secondNumber = ResistorColorNumber::fromName($colors[1]);

        return (int) ($firstNumber->value . $secondNumber->value);
    }
}

enum ResistorColorNumber: int
{
    case black  = 0;
    case brown  = 1;
    case red    = 2;
    case orange = 3;
    case yellow = 4;
    case green  = 5;
    case blue   = 6;
    case violet = 7;
    case grey   = 8;
    case white  = 9;

    public static function fromName(string $name): self
    {
        return match ($name) {
            'black'  => self::black,
            'brown'  => self::brown,
            'red'    => self::red,
            'orange' => self::orange,
            'yellow' => self::yellow,
            'green'  => self::green,
            'blue'   => self::blue,
            'violet' => self::violet,
            'grey'   => self::grey,
            'white'  => self::white,
        };
    }
}
