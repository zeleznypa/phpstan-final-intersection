<?php

declare(strict_types=1);

namespace Zeleznypa\PhpstanFinalIntersection;

trait DataProvider
{
    /**
     * @return string[]
     */
    public static function stringDataProvider(): array
    {
        return ['A', 'B'];
    }

}
