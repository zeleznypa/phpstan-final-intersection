<?php

declare(strict_types=1);

namespace Zeleznypa\PhpstanFinalIntersection;

use DG\BypassFinals;
use Nette\InvalidArgumentException;
use PHPUnit\Runner\BeforeFirstTestHook;

use function class_exists;

class BypassFinalHook implements BeforeFirstTestHook
{
    /**
     * @var array<string>
     */
    protected array $classList = [];

    /**
     * Constructor
     *
     * @param array<string> $classList
     * @return void
     */
    public function __construct(array $classList = [])
    {
        $this->setClassList($classList);
    }

    public function executeBeforeFirstTest(): void
    {
        $classList = $this->getClassList();
        if (isset($classList[0]) === true) {
            BypassFinals::enable();
            foreach ($classList as $class) {
                if (class_exists($class) !== true) {
                    throw new InvalidArgumentException('Bypass final class "' . $class . '" not exists');
                }
            }
        }
    }

    // <editor-fold defaultstate="collapsed" desc="Getters & Setters">
    /**
     * ClassList getter
     *
     * @return array<string>
     */
    protected function getClassList(): array
    {
        return $this->classList
        ;
    }

    /**
     * ClassList setter
     *
     * @param array<string> $classList
     * @return static Provides fluent interface
     */
    protected function setClassList(array $classList): static
    {
        $this->classList = $classList;
        return $this;
    }

    // </editor-fold>
}
