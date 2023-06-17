<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Tests\Unit;

use GrigoryGerasimov\Weather\Tests\TestCase;

class InitTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function test_example_truthy(): void
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     * @return void
     */
    public function test_example_falsy(): void
    {
        $this->assertFalse(false);
    }
}