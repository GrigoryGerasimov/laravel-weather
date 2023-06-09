<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Models;

use GrigoryGerasimov\Weather\Objects\{AirQuality, Alert, Astronomy, Current, Sports, Timezone};
use GrigoryGerasimov\Weather\Objects\Forecast\Forecast;
use GrigoryGerasimov\Weather\Objects\GPS\{IpLookup, Location, Search};
use GrigoryGerasimov\Weather\Objects\Marine\Marine;
use Illuminate\Support\Collection;

class Weather
{
    public function __construct(
        protected \stdClass|array $weatherData
    ) {}

    public function current(): Current
    {
        return new Current($this->weatherData);
    }

    public function forecast(): Collection
    {
        return collect($this->weatherData->forecast->forecastday)->keyBy('date')->mapInto(Forecast::class);
    }

    public function marine(): Collection
    {
        return collect($this->weatherData->forecast->forecastday)->keyBy('date')->mapInto(Marine::class);
    }

    public function timezone(): Timezone
    {
        return new Timezone($this->weatherData);
    }

    public function ipLookup(): IpLookup
    {
        return new IpLookup($this->weatherData);
    }

    public function search(): Collection
    {
        return collect($this->weatherData)->keyBy('id')->mapInto(Search::class);
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

    public function sports(): Collection
    {
        $sportsData = [];

        foreach(get_object_vars($this->weatherData) as $sportsType => $sportsDetails) {
            $sportsData[$sportsType] = collect($this->weatherData->$sportsType)->mapInto(Sports::class);
        }

        return collect($sportsData);
    }
}