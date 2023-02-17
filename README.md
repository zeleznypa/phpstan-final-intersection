The `main` branch shows the simple code, where `DG\bypass-final` works.

Each other branch shows, that simple non-relevat code can lead to the issue with unresolvable type when there is
an intersection with final class.

---

Call the following commands in the root folder:

```bash
./vendor/bin/phpstan analyse --xdebug --level=max -c phpstan.neon --debug ./src ./tests
```

returns

```
 ------ ----------------------------------------------------------------------------------------------------------------------------
  Line   tests/TestFinalClass.php
 ------ ----------------------------------------------------------------------------------------------------------------------------
  24     Method Zeleznypa\PhpstanFinalIntersection\TestFinalClass::createFinalClassMock() has unresolvable native return type.
  24     PHPDoc tag @return contains unresolvable type.
  26     Return type of call to method PHPUnit\Framework\TestCase::createPartialMock() contains unresolvable type.
  27     Method Zeleznypa\PhpstanFinalIntersection\TestFinalClass::createFinalClassMock() with return type void returns *NEVER* but
         should not return anything.
 ------ ----------------------------------------------------------------------------------------------------------------------------
```

but it is not true.

---

Proof:

Call the following commands in the root folder:

```bash
./vendor/bin/phpunit -c ./phpunit.xml ./tests/TestFinalClass.php
```

which returns and shows, that the PHPStan error is irelevant

```
PHPUnit 9.6.3 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.2.3
Configuration: ./phpunit.xml

.                                                                   1 / 1 (100%)

Time: 00:00.084, Memory: 6.00 MB

OK (1 test, 1 assertion)

```