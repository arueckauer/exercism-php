<?php

declare(strict_types=1);

class PizzaPi
{
    private static int $doughPerPerson = 20;
    private static int $doughPerPizza  = 200;
    private static int $saucePerPizza  = 125;
    private static int $slicePerPizza  = 8;

    public function calculateDoughRequirement(int $numberOfPizzas, int $numberOfPersons): int
    {
        return $numberOfPizzas * ($numberOfPersons * self::$doughPerPerson + self::$doughPerPizza);
    }

    public function calculateSauceRequirement(int $numberOfPizzas, int $sauceCanVolume): float
    {
        return $numberOfPizzas * self::$saucePerPizza / $sauceCanVolume;
    }

    public function calculateCheeseCubeCoverage(
        int $cheeseCubeSideLength,
        float $cheeseLayerThickness,
        int $pizzaDiameter,
    ): float {
        return (int) ($cheeseCubeSideLength ** 3 / ($cheeseLayerThickness * pi() * $pizzaDiameter));
    }

    public function calculateLeftOverSlices(int $numberOfPizzas, int $numberOfPersons): int
    {
        return $numberOfPizzas * self::$slicePerPizza % $numberOfPersons;
    }
}
