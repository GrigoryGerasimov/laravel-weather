<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Forecast;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;
use GrigoryGerasimov\Weather\Objects\Astronomy;

final readonly class ForecastAstro implements WeatherObjectInterface
{
    private \stdClass $forecastAstro;

    public function __construct(\stdClass $forecast)
    {
        $this->forecastAstro = $forecast->astro;
    }

    public function getCommonAstronomyParams(): ?Astronomy
    {
        return isset($this->forecastAstro) ? new Astronomy($this->forecastAstro) : null;
    }
}