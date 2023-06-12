<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Forecast;

use GrigoryGerasimov\Weather\Objects\{AirQuality, Condition};
use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class ForecastDay implements WeatherObjectInterface
{
    private \stdClass $forecastDay;

    public function __construct(\stdClass $forecast)
    {
        $this->forecastDay = $forecast->day;
    }
    public function getMaxCelsius(): ?float
    {
        return $this->forecastDay->maxtemp_c ?? null;
    }

    public function getMaxFahrenheit(): ?float
    {
        return $this->forecastDay->maxtemp_f ?? null;
    }

    public function getMinCelsius(): ?float
    {
        return $this->forecastDay->mintemp_c ?? null;
    }

    public function getMinFahrenheit(): ?float
    {
        return $this->forecastDay->mintemp_f ?? null;
    }

    public function getAvgCelsius(): ?float
    {
        return $this->forecastDay->avgtemp_c ?? null;
    }

    public function getAvgFahrenheit(): ?float
    {
        return $this->forecastDay->avgtemp_f ?? null;
    }

    public function getMaxWindSpeedInMiles(): ?float
    {
        return $this->forecastDay->maxwind_mph ?? null;
    }

    public function getMaxWindSpeedInKm(): ?float
    {
        return $this->forecastDay->maxwind_kph ?? null;
    }

    public function getTotalPrecipitationInMm(): ?float
    {
        return $this->forecastDay->totalprecip_mm ?? null;
    }

    public function getTotalPrecipitationInInches(): ?float
    {
        return $this->forecastDay->totalprecip_in ?? null;
    }

    public function getAvgVisibilityInKm(): ?float
    {
        return $this->forecastDay->avgvis_km ?? null;
    }

    public function getAvgVisibilityInMiles(): ?float
    {
        return $this->forecastDay->avgvis_miles ?? null;
    }

    public function getAvgHumidity(): ?int
    {
        return $this->forecastDay->avghumidity ?? null;
    }

    public function getWeatherCondition(): ?Condition
    {
        return isset($this->forecastDay->condition) ? new Condition($this->forecastDay->condition) : null;
    }

    public function getUVIndex(): ?float
    {
        return $this->forecastDay->uv ?? null;
    }

    public function getAirQuality(): ?AirQuality
    {
        return isset($this->forecastDay->air_quality) ? new AirQuality($this->forecastDay) : null;
    }
}