<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Models;

use GrigoryGerasimov\Weather\Exceptions\ReceivedApiErrorCodeException;
use GrigoryGerasimov\Weather\Objects\{AirQuality, Alert, Astronomy, Current, Sports, Timezone};
use GrigoryGerasimov\Weather\Objects\Forecast\Forecast;
use GrigoryGerasimov\Weather\Objects\GPS\{IpLookup, Location, Search};
use GrigoryGerasimov\Weather\Objects\Marine\Marine;
use GrigoryGerasimov\Weather\Services\WithExceptionHandler;
use Illuminate\Support\Collection;

class Weather
{
    use WithExceptionHandler;

    public function __construct(
        protected \stdClass|array $weatherData
    ) {}

    public function current(): ?Current
    {
        if (!$this->validateWeatherData()) {
            return null;
        }

        return new Current($this->weatherData);
    }

    public function forecast(): ?Collection
    {
        if (
            !$this->validateWeatherData() ||
            !isset($this->weatherData->forecast, $this->weatherData->forecast->forecastday)
        ) {
            return null;
        }

        return collect($this->weatherData->forecast->forecastday)->keyBy('date')->mapInto(Forecast::class);
    }

    public function marine(): ?Collection
    {
        if (
            !$this->validateWeatherData() ||
            !isset($this->weatherData->forecast, $this->weatherData->forecast->forecastday)
        ) {
            return null;
        }

        return collect($this->weatherData->forecast->forecastday)->keyBy('date')->mapInto(Marine::class);
    }

    public function timezone(): ?Timezone
    {
        if (
            !$this->validateWeatherData() ||
            !isset($this->weatherData->location)
        ) {
            return null;
        }

        return new Timezone($this->weatherData->location);
    }

    public function ipLookup(): ?IpLookup
    {
        if (!$this->validateWeatherData()) {
            return null;
        }

        return new IpLookup($this->weatherData);
    }

    public function search(): ?Collection
    {
        if (!$this->validateWeatherData()) {
            return null;
        }

        return collect($this->weatherData)->keyBy('id')->mapInto(Search::class);
    }

    public function location(): ?Location
    {
        if (!$this->validateWeatherData()) {
            return null;
        }

        return new Location($this->weatherData);
    }

    public function airQuality(): ?AirQuality
    {
        if (
            !$this->validateWeatherData() ||
            !isset($this->weatherData->current)
        ) {
            return null;
        }

        return new AirQuality($this->weatherData->current);
    }

    public function alerts(): ?Collection
    {
        if (
            !$this->validateWeatherData() ||
            !isset($this->weatherData->alerts, $this->weatherData->alerts->alert)
        ) {
            return null;
        }

        return collect($this->weatherData->alerts->alert)->mapInto(Alert::class);
    }

    public function astro(): ?Astronomy
    {
        if (!$this->validateWeatherData()) {
            return null;
        }

        return new Astronomy($this->weatherData);
    }

    public function sports(): ?Collection
    {
        if (!$this->validateWeatherData()) {
            return null;
        }

        $sportsData = [];

        foreach(get_object_vars($this->weatherData) as $sportsType => $sportsDetails) {
            $sportsData[$sportsType] = isset($this->weatherData->$sportsType) ? collect($this->weatherData->$sportsType)->mapInto(Sports::class) : null;
        }

        return collect($sportsData);
    }

    /**
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    private function validateWeatherData(): bool
    {
        try {
            if (isset($this->weatherData->error)) {
                throw new ReceivedApiErrorCodeException($this->weatherData->error);
            }
            if (!isset($this->weatherData)) {
                return false;
            }
        } catch (ReceivedApiErrorCodeException $e) {
            $this->handleWeatherException($e);
        } catch (\Throwable $e) {
            $this->handleThrowable($e);
        }

        return true;
    }
}