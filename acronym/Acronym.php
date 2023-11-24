<?php

declare(strict_types=1);

function acronym(string $text): string
{
    if (mb_substr_count($text, ' ') === 0) {
        return '';
    }

    // Add space before uppercase character in a word
    $text = preg_replace('/([a-z])([A-Z])/', '$1 $2', $text);

    $acronym = '';
    $words   = preg_split('/[\s-]/', mb_strtolower($text));
    foreach ($words as $word) {
        if (mb_strtoupper($word) !== $word) {
            $acronym .= mb_strtoupper(mb_substr($word, 0, 1));
        }
    }

    return $acronym;
}
