<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Models;

use GrigoryGerasimov\Weather\Objects\GPS\Location;

class Weather
{
    private Location $location;

    public function __construct(
        protected \stdClass $weatherData
    ) {
        $this->location = new Location($this->weatherData);
    }

    /** @return array<?string> */
    public function getLocation(): array
    {
        return [
            'city' => $this->location->getCity(),
            'region' => $this->location->getRegion(),
            'country' => $this->location->getCountry()
        ];
    }

    /** @return array<?float> */
    public function getGeoCoords(): array
    {
        return [
            'latitude' => $this->location->getLatitude(),
            'longitude' => $this->location->getLongitude()
        ];
    }

    public function getLocalTimezone(): ?string
    {
        return $this->location->getTimezoneName();
    }

    /** @return array<?int, ?string> */
    public function getLocalTime(): array
    {
        return [
            'timestamp' => $this->location->getTimestamp(),
            'datetime' => $this->location?->getDateTime()
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