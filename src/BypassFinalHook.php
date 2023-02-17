<?php

declare(strict_types=1);

namespace Zeleznypa\PhpstanFinalIntersection;

use DG\BypassFinals;
use PHPUnit\Runner\BeforeFirstTestHook;

class BypassFinalHook implements BeforeFirstTestHook
{
    public function executeBeforeFirstTest(): void
    {
        BypassFinals::enable();
    }
}
