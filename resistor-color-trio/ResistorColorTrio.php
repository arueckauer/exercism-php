<?php

declare(strict_types=1);

class ResistorColorTrio
{
    public function label(array $colors): string
    {
        $firstNumber  = TrioResistorColorNumber::fromName($colors[0]);
        $secondNumber = TrioResistorColorNumber::fromName($colors[1]);
        $thirdNumber  = isset($colors[2]) ? TrioResistorColorNumber::fromName($colors[2])->value : 0;
        $zeros        = str_pad('', $thirdNumber, '0');

        return $this->format((int) ($firstNumber->value . $secondNumber->value . $zeros));
    }

    private function format(int $value): string
    {
        if ($value === 0) {
            return $value . ' ohms';
        }

        if ($value % 1000000000 === 0) {
            return $value / 1000000000 . ' gigaohms';
        }

        if ($value % 1000000 === 0) {
            return $value / 1000000 . ' megaohms';
        }

        if ($value % 1000 === 0) {
            return $value / 1000 . ' kiloohms';
        }

        return $value . ' ohms';
    }
}

enum TrioResistorColorNumber: int
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
