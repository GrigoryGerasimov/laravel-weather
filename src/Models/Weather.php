<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Models;

use GrigoryGerasimov\Weather\Contracts\{WeatherCollection\WeatherMarineInterface};
use GrigoryGerasimov\Weather\Objects\{AirQuality, Alert, Astronomy, Current, Sports, Timezone};
use GrigoryGerasimov\Weather\Objects\Forecast\{Forecast, ForecastAstro, ForecastCommon, ForecastDay};
use GrigoryGerasimov\Weather\Objects\GPS\{IpLookup, Location, Search};
use GrigoryGerasimov\Weather\Objects\Marine\{Marine, MarineHour, MarineTide};
use Illuminate\Support\Collection;

class Weather
{
    public function __construct(
        protected \stdClass $weatherData
    ) {}

    public function current(): Current
    {
        return new Current($this->weatherData);
    }

    public function forecast(): Collection
    {
        return collect($this->weatherData->forecast->forecastday)->map(fn($forecastItem) => new Forecast($forecastItem));
    }

    public function marine(): Collection
    {
        return collect($this->weatherData->forecast->forecastday)->map(fn($forecastMarineItem) => new Marine($forecastMarineItem));
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