<?php

declare(strict_types=1);

class Proverb
{
    public function recite(array $words): array
    {
        if (count($words) === 0) {
            return [];
        }

        if (count($words) === 1) {
            return [$this->lastVerse($words[0])];
        }

        $output = [];
        $max    = count($words) - 1;
        for ($i = 0; $i < $max; $i++) {
            $output[] = sprintf(
                'For want of a %s the %s was lost.',
                $words[$i],
                $words[$i + 1],
            );
        }
        $output[] = $this->lastVerse($words[0]);

        return $output;
    }

    private function lastVerse(string $word): string
    {
        return sprintf(
            'And all for the want of a %s.',
            $word,
        );
    }
}
