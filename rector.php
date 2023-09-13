<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__.'/src',
        __DIR__.'/tests',
    ]);

    $rectorConfig->phpVersion(\Rector\Core\ValueObject\PhpVersion::PHP_82);
    $rectorConfig->sets([
        SetList::PHP_82,
//        SetList::CODING_STYLE
    ]);

    $rectorConfig->skip([
        \Rector\CodingStyle\Rector\Class_\AddArrayDefaultToArrayPropertyRector::class,
        \Rector\CodingStyle\Rector\ClassMethod\UnSpreadOperatorRector::class
    ]);
};
