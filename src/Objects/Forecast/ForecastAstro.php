<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Forecast;

use GrigoryGerasimov\Weather\Objects\Astronomy;

final readonly class ForecastAstro extends Forecast
{
    private \stdClass $forecastAstro;

    public function __construct(
        protected \stdClass $forecast
    ) {
        parent::__construct($forecast);

        $this->forecastAstro = $forecast->astro;
    }

    public function getCommonAstronomyParams(): Astronomy
    {
        return new Astronomy($this->forecastAstro);
    }
}