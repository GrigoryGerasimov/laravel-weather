<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Astronomy implements WeatherObjectInterface
{
    /**
     * @param \stdClass $astronomy
     */
    public function __construct(
        private \stdClass $astronomy
    ) {}

    /**
     * @return string|null
     */
    public function getSunriseTime(): ?string
    {
        return $this->astronomy->sunrise ?? null;
    }

    /**
     * @return string|null
     */
    public function getSunsetTime(): ?string
    {
        return $this->astronomy->sunset ?? null;
    }

    /**
     * @return string|null
     */
    public function getMoonriseTime(): ?string
    {
        return $this->astronomy->moonrise ?? null;
    }

    /**
     * @return string|null
     */
    public function getMoonsetTime(): ?string
    {
        return $this->astronomy->moonset ?? null;
    }

    /**
     * Moon phases.
     *
     * Value returned:
     * New Moon,
     * Waxing Crescent,
     * First Quarter,
     * Waxing Gibbous,
     * Full Moon,
     * Waning Gibbous,
     * Last Quarter,
     * Waning Crescent,
     *
     * More details in the official WeatherAPI documentation
     *
     * @link https://www.weatherapi.com/docs/
     * @return string|null
     */
    public function getMoonPhase(): ?string
    {
        return $this->astronomy->moon_phase ?? null;
    }

    /**
     * @return int|string|null
     */
    public function getMoonIllumination(): int|string|null
    {
        return $this->astronomy->moon_illumination ?? null;
    }

    /**
     * @return int|null
     */
    public function isMoonUp(): ?int
    {
        return $this->astronomy->is_moon_up ?? null;
    }

    /**
     * @return int|null
     */
    public function isSunUp(): ?int
    {
        return $this->astronomy->is_sun_up ?? null;
    }
}
