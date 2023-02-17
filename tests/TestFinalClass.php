<?php

declare(strict_types=1);

namespace Zeleznypa\PhpstanFinalIntersection;

use Nette\Application\UI\Link;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class TestFinalClass extends TestCase
{
    /**
     * Tester of bypass final class
     *
     * @return void
     */
    public function testBypassFinalClass(): void
    {
        $key = 'key';
        $value = 'value';
        $finalClass = $this->createLinkMock();
        $finalClass->setParameter($key, $value);
        self::assertSame($value, $finalClass->getParameter($key));
    }

    /**
     * Link mock factory
     *
     * @param string[] $methods [OPTIONAL] List of mocked method names
     * @return Link&MockObject
     */
    protected function createLinkMock(array $methods = []): Link&MockObject
    {
        $mock = $this->createPartialMock(Link::class, $methods);
        return $mock;
    }
}
