<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Astronomy implements WeatherObjectInterface
{
    public function __construct(
        private \stdClass $astronomy
    ) {}

    public function getSunriseTime(): ?string
    {
        return $this->astronomy->sunrise;
    }

    public function getSunsetTime(): ?string
    {
        return $this->astronomy->sunset;
    }

    public function getMoonriseTime(): ?string
    {
        return $this->astronomy->moonrise;
    }

    public function getMoonsetTime(): ?string
    {
        return $this->astronomy->moonset;
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
        return $this->astronomy->moon_phase;
    }

    public function getMoonIllumination(): ?float
    {
        return $this->astronomy->moon_illumination;
    }
}
