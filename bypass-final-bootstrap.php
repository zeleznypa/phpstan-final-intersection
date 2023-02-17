<?php

declare(strict_types=1);

use DG\BypassFinals;

$phpunitXmlFile = __DIR__ . DIRECTORY_SEPARATOR . 'phpunit.xml';
if (file_exists($phpunitXmlFile) === true) {
    $xml = simplexml_load_file($phpunitXmlFile);
    $classList = $xml->xpath('//extensions/extension[contains(@class,\'BypassFinalHook\')]/arguments/array/element/string');
    if (isset($classList[0]) === true) {
        BypassFinals::enable();
        foreach ($classList as $classNode) {
            $class = (string) $classNode;
            if (class_exists($class) !== true) {
                throw new InvalidArgumentException('Bypass final class "' . $class . '" not exists');
            }
            $reflection = new ReflectionClass($class);
            echo 'Bypass final class "' . $class . '" is ' . ($reflection->isFinal() ? 'still final.' : 'fixed.') . PHP_EOL;
        }
        echo PHP_EOL;
    }
}

