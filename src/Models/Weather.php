<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Models;

use GrigoryGerasimov\Weather\Objects\{
    AirQuality,
    Alert,
    Astronomy,
    Current,
    Sports,
    Timezone
};
use GrigoryGerasimov\Weather\Objects\Forecast\{
    Forecast,
    ForecastDay,
    ForecastAstro,
    ForecastHour
};
use GrigoryGerasimov\Weather\Objects\Marine\{
    Marine,
    MarineHour,
    MarineTides
};
use GrigoryGerasimov\Weather\Objects\GPS\{IpLookup, Location, Search};

class Weather
{
    public function __construct(
        protected \stdClass $weatherData
    ) {}

    public function current(): Current
    {
        return new Current($this->weatherData);
    }

    /** @return array<Forecast> */
    public function forecast(): array
    {
        return [
            new ForecastDay($this->weatherData),
            new ForecastAstro($this->weatherData),
            new ForecastHour($this->weatherData)
        ];
    }

    /** @return array<Marine> */
    public function marine(): array
    {
        return [
            new MarineHour($this->weatherData),
            new MarineTides($this->weatherData)
        ];
    }

    public function timezone(): Timezone
    {
        return new Timezone($this->weatherData);
    }

    public function ipLookup(): IpLookup
    {
        return new IpLookup($this->weatherData);
    }

    public function search(): Search
    {
        return new Search($this->weatherData);
    }

    public function location(): Location
    {
        return new Location($this->weatherData);
    }

    public function airQuality(): AirQuality
    {
        return new AirQuality($this->weatherData);
    }

    public function alerts(): Alert
    {
        return new Alert($this->weatherData);
    }

    public function astro(): Astronomy
    {
        return new Astronomy($this->weatherData);
    }

    public function sports(): Sports
    {
        return new Sports($this->weatherData);
    }
}