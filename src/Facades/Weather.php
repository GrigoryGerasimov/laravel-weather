<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Facades;

use GrigoryGerasimov\Weather\Contracts\WeatherServiceInterface;
use Illuminate\Support\Facades\Facade;

class Weather extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WeatherServiceInterface::class;
    }
}