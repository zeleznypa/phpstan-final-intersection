<?php

declare(strict_types=1);

namespace Zeleznypa\PhpstanFinalIntersection;

use PHPUnit\Framework\MockObject\MockObject;

class TestFinalClass extends BaseTestCase
{
    public function testBypassFinalClass(): void
    {
        $finalClass = $this->createFinalClassMock();
        self::assertTrue($finalClass->doSomething());
    }

    /**
     * FinalClass mock factory
     *
     * @param string[] $methods [OPTIONAL] List of mocked method names
     * @return FinalClass&MockObject
     */
    protected function createFinalClassMock(array $methods = []): FinalClass&MockObject
    {
        $mock = $this->createPartialMock(FinalClass::class, $methods);
        return $mock;
    }
}
