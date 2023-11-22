<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths(
        [
        __DIR__ . '/high-scores',
        __DIR__ . '/resistor-color',
        __DIR__ . '/reverse-string',
        __DIR__ . '/robot-simulator',
        __DIR__ . '/tournament',
        ]
    );

    $rectorConfig->sets(
        [
        LevelSetList::UP_TO_PHP_81,
        PHPUnitSetLists::PHPUNIT_100,
        ]
    );
};
