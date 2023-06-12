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
        if (!$this->validateWeatherData('current')) {
            return null;
        }

        return new Current($this->weatherData);
    }

    public function forecast(): ?Collection
    {
        if (!$this->validateWeatherData('forecast', 'forecastday')) {
            return null;
        }

        return collect($this->weatherData->forecast->forecastday)->keyBy('date')->mapInto(Forecast::class);
    }

    public function marine(): ?Collection
    {
        if (!$this->validateWeatherData('forecast', 'forecastday')) {
            return null;
        }

        return collect($this->weatherData->forecast->forecastday)->keyBy('date')->mapInto(Marine::class);
    }

    public function timezone(): ?Timezone
    {
        if (!$this->validateWeatherData('location')) {
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

        return is_array($this->weatherData) ? collect($this->weatherData)->keyBy('id')->mapInto(Search::class) : null;
    }

    public function location(): ?Location
    {
        if (!$this->validateWeatherData('location')) {
            return null;
        }

        return new Location($this->weatherData);
    }

    /*
     * The Weather model airQuality method serves for the Current API method only.
     * For Forecast API please use the appropriate ForecastDay and ForecastHour getAirQuality method.
     */
    public function airQuality(): ?AirQuality
    {
        if (!$this->validateWeatherData('current')) {
            return null;
        }

        return new AirQuality($this->weatherData->current);
    }

    public function alerts(): ?Collection
    {
        if (!$this->validateWeatherData('alerts', 'alert')) {
            return null;
        }

        return collect($this->weatherData->alerts->alert)->mapInto(Alert::class);
    }

    public function astro(): ?Astronomy
    {
        if (!$this->validateWeatherData('astronomy', 'astro')) {
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
    private function validateWeatherData(?string $outerKey = null, ?string $innerKey = null): bool
    {
        try {
            if (isset($this->weatherData->error)) {
                throw new ReceivedApiErrorCodeException($this->weatherData->error);
            }
            if (
                !isset($this->weatherData) ||
                !is_null($outerKey) && !isset($this->weatherData->$outerKey) ||
                !is_null($innerKey) && !isset($this->weatherData->$outerKey->$innerKey)
            ) {
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