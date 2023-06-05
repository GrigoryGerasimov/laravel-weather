<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Models;

class CurrentWeather
{
    protected \stdClass $weatherData;

    public function __construct(\stdClass $weatherData)
    {
        $this->weatherData = $weatherData;
    }

    /** @return array<string> */
    public function getLocationMark(): array
    {
        return [
            $this->weatherData->location?->name,
            $this->weatherData->location?->country
        ];
    }

    /** @return array<float> */
    public function getLocalCoords(): array
    {
        return [
            $this->weatherData->location?->lat,
            $this->weatherData->location?->lon
        ];
    }

    public function getCelsius(): int|float
    {
        return $this->weatherData->current?->temp_c;
    }

    public function getFahrenheit(): int|float
    {
        return $this->weatherData->current?->temp_f;
    }
}