<?php

declare(strict_types=1);

namespace Exercism\Anagram;

use function array_count_values;
use function mb_strtolower;
use function str_split;

function detectAnagrams(string $word, array $possibleAnagrams): array
{
    $anagrams   = [];
    $word       = mb_strtolower($word);
    $wordValues = array_count_values(str_split($word));
    foreach ($possibleAnagrams as $possibleAnagram) {
        $lowerPossibleAnagram = mb_strtolower($possibleAnagram);

        if ($lowerPossibleAnagram === $word) {
            continue;
        }

        if (array_count_values(str_split($lowerPossibleAnagram)) == $wordValues) {
            $anagrams[] = $possibleAnagram;
        }
    }

    return $anagrams;
}
