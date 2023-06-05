<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Facades;

use GrigoryGerasimov\Weather\Services\WeatherService;
use Illuminate\Support\Facades\Facade;

class Weather extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WeatherService::class;
    }
}