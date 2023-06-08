<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;
use GrigoryGerasimov\Weather\Objects\Forecast\ForecastAstro;

final readonly class Astronomy implements WeatherObjectInterface
{
    public function __construct(
        private \stdClass $astronomy
    ) {}

    public function getCommonForecastAstroParams(): ForecastAstro
    {
        return new ForecastAstro($this->astronomy);
    }
}
