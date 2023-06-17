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

    /**
     * @param \stdClass|array<\stdClass> $weatherData
     */
    public function __construct(
        protected \stdClass|array $weatherData
    ) {}

    /**
     * The Weather model Current method serves for the Current API method only
     * and cannot be combined with any other API method
     *
     * @link https://www.weatherapi.com/docs/
     * @return Current|null
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function current(): ?Current
    {
        if (!$this->validateWeatherData('current')) {
            return null;
        }

        return new Current($this->weatherData);
    }

    /**
     * @return Collection<Forecast>|null
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function forecast(): ?Collection
    {
        if (!$this->validateWeatherData('forecast', 'forecastday')) {
            return null;
        }

        return collect($this->weatherData->forecast->forecastday)->keyBy('date')->mapInto(Forecast::class);
    }

    /**
     * @return Collection<Marine>|null
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function marine(): ?Collection
    {
        if (!$this->validateWeatherData('forecast', 'forecastday')) {
            return null;
        }

        return collect($this->weatherData->forecast->forecastday)->keyBy('date')->mapInto(Marine::class);
    }

    /**
     * @return Timezone|null
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function timezone(): ?Timezone
    {
        if (!$this->validateWeatherData('location')) {
            return null;
        }

        return new Timezone($this->weatherData->location);
    }

    /**
     * The Weather model IpLookup method serves for the IP Lookup API method only
     * and cannot be combined with any other API method
     *
     * @link https://www.weatherapi.com/docs/
     * @return IpLookup|null
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function ipLookup(): ?IpLookup
    {
        if (
            !$this->validateWeatherData() ||
            !is_object($this->weatherData)
        ) {
            return null;
        }

        return new IpLookup($this->weatherData);
    }

    /**
     * The Weather model Search method serves for the Search API method only
     * and cannot be combined with any other API method
     *
     * @link https://www.weatherapi.com/docs/
     * @return Collection<Search>|null
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function search(): ?Collection
    {
        if (
            !$this->validateWeatherData() ||
            !is_array($this->weatherData)
        ) {
            return null;
        }

        return collect($this->weatherData)->keyBy('id')->mapInto(Search::class);
    }

    /**
     * @return Location|null
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function location(): ?Location
    {
        if (!$this->validateWeatherData('location')) {
            return null;
        }

        return new Location($this->weatherData->location);
    }

    /**
     * The Weather model AirQuality method serves for the Current API method only
     * and cannot be combined with any other API method
     *
     * For Forecast API please use the appropriate ForecastDay and ForecastHour GetAirQuality method
     *
     * @link https://www.weatherapi.com/docs/
     * @return AirQuality|null
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function airQuality(): ?AirQuality
    {
        if (!$this->validateWeatherData('current', 'air_quality')) {
            return null;
        }

        return new AirQuality($this->weatherData->current);
    }

    /**
     * @return Collection<Alert>|null
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function alerts(): ?Collection
    {
        if (!$this->validateWeatherData('alerts', 'alert')) {
            return null;
        }

        return collect($this->weatherData->alerts->alert)->mapInto(Alert::class);
    }

    /**
     * The Weather model Astro method serves for the Astronomy API method only
     * and cannot be combined with any other API method
     *
     * For Forecast API please use the appropriate Forecast Astro method
     *
     * @link https://www.weatherapi.com/docs/
     * @return Astronomy|null
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function astro(): ?Astronomy
    {
        if (!$this->validateWeatherData('astronomy', 'astro')) {
            return null;
        }

        return new Astronomy($this->weatherData->astronomy->astro);
    }

    /**
     * The Weather model Sports method serves for the Sport API method only
     * and cannot be combined with any other API method
     *
     * @link https://www.weatherapi.com/docs/
     * @return Collection|null
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function sports(): ?Collection
    {
        if (
            !$this->validateWeatherData() ||
            !is_object($this->weatherData)
        ) {
            return null;
        }

        $sportsData = [];

        foreach(get_object_vars($this->weatherData) as $sportsType => $sportsDetails) {
            $sportsData[$sportsType] = isset($this->weatherData->$sportsType) ? collect($sportsDetails)->mapInto(Sports::class) : null;
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