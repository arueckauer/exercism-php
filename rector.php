<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths(
        [
        __DIR__ . '/annalyns-infiltration',
        __DIR__ . '/city-office',
        __DIR__ . '/high-scores',
        __DIR__ . '/lasagna',
        __DIR__ . '/language-list',
        __DIR__ . '/lucky-numbers',
        __DIR__ . '/pizza-pi',
        __DIR__ . '/resistor-color',
        __DIR__ . '/reverse-string',
        __DIR__ . '/robot-simulator',
        __DIR__ . '/sweethearts',
        __DIR__ . '/tournament',
        __DIR__ . '/windowing-system',
        ]
    );

    $rectorConfig->sets(
        [
        LevelSetList::UP_TO_PHP_81,
        Rector\PHPUnit\Set\PHPUnitSetList::PHPUNIT_100,
        ]
    );
};
