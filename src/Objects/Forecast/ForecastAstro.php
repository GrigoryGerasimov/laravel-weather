<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Forecast;

final readonly class ForecastAstro extends Forecast
{
    private \stdClass $forecastAstro;

    public function __construct(
        protected \stdClass $forecast
    ) {
        parent::__construct($forecast);

        $this->forecastAstro = $forecast->astro;
    }

    public function getSunriseTime(): ?string
    {
        return $this->forecastAstro->sunrise;
    }

    public function getSunsetTime(): ?string
    {
        return $this->forecastAstro->sunset;
    }

    public function getMoonriseTime(): ?string
    {
        return $this->forecastAstro->moonrise;
    }

    public function getMoonsetTime(): ?string
    {
        return $this->forecastAstro->moonset;
    }

    /*
     * Moon phases.
     *
     * Value returned:
     * New Moon
     * Waxing Crescent
     * First Quarter
     * Waxing Gibbous
     * Full Moon
     * Waning Gibbous
     * Last Quarter
     * Waning Crescent
     *
     * More details here:https://www.weatherapi.com/docs/
     */
    public function getMoonPhase(): ?string
    {
        return $this->forecastAstro->moon_phase;
    }

    public function getMoonIllumination(): ?float
    {
        return $this->forecastAstro->moon_illumination;
    }
}