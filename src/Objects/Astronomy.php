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
        return $this->astronomy->sunrise ?? null;
    }

    public function getSunsetTime(): ?string
    {
        return $this->astronomy->sunset ?? null;
    }

    public function getMoonriseTime(): ?string
    {
        return $this->astronomy->moonrise ?? null;
    }

    public function getMoonsetTime(): ?string
    {
        return $this->astronomy->moonset ?? null;
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
        return $this->astronomy->moon_phase ?? null;
    }

    public function getMoonIllumination(): int|string|null
    {
        return $this->astronomy->moon_illumination ?? null;
    }

    public function isMoonUp(): ?int
    {
        return $this->astronomy->is_moon_up ?? null;
    }

    public function isSunUp(): ?int
    {
        return $this->astronomy->is_sun_up ?? null;
    }
}
