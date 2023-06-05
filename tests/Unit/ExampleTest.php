<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Test\Unit;

use Orchestra\Testbench\TestCase;

class ExampleTest extends TestCase
{
    public function test_example_truthy()
    {
        $this->assertTrue(true);
    }

    public function test_example_falsy()
    {
        $this->assertFalse(false);
    }
}