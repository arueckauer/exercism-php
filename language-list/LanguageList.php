<?php

declare(strict_types=1);

function language_list(string ...$language_list): array
{
    return $language_list;
}

function add_to_language_list(array $language_list, string $language): array
{
    $language_list[] = $language;
    return $language_list;
}

function prune_language_list(array $language_list): array
{
    array_shift($language_list);
    return $language_list;
}

function current_language(array $language_list): string
{
    return $language_list[0];
}

function language_list_length(array $language_list): int
{
    return count($language_list);
}
