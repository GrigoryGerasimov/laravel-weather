<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Tests;

use GrigoryGerasimov\Weather\Providers\WeatherServiceProvider;
use \Orchestra\Testbench\TestCase as OrchestraTestCase;

class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            WeatherServiceProvider::class
        ];
    }
}