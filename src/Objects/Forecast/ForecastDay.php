<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Forecast;

use GrigoryGerasimov\Weather\Objects\AirQuality;
use GrigoryGerasimov\Weather\Contracts\{
    WeatherConditionInterface,
    WeatherObjectInterface
};

final readonly class ForecastDay implements WeatherObjectInterface, WeatherConditionInterface
{
    private \stdClass $forecastDay;

    public function __construct(\stdClass $forecast)
    {
        $this->forecastDay = $forecast->day;
    }
    public function getMaxCelsius(): ?float
    {
        return $this->forecastDay->maxtemp_c;
    }

    public function getMaxFahrenheit(): ?float
    {
        return $this->forecastDay->maxtemp_f;
    }

    public function getMinCelsius(): ?float
    {
        return $this->forecastDay->mintemp_c;
    }

    public function getMinFahrenheit(): ?float
    {
        return $this->forecastDay->mintemp_f;
    }

    public function getAvgCelsius(): ?float
    {
        return $this->forecastDay->avgtemp_c;
    }

    public function getAvgFahrenheit(): ?float
    {
        return $this->forecastDay->avgtemp_f;
    }

    public function getMaxWindSpeedInMiles(): ?float
    {
        return $this->forecastDay->maxwind_mph;
    }

    public function getMaxWindSpeedInKm(): ?float
    {
        return $this->forecastDay->maxwind_kph;
    }

    public function getTotalPrecipitationInMm(): ?float
    {
        return $this->forecastDay->totalprecip_mm;
    }

    public function getTotalPrecipitationInInches(): ?float
    {
        return $this->forecastDay->totalprecip_in;
    }

    public function getAvgVisibilityInKm(): ?float
    {
        return $this->forecastDay->avgvis_km;
    }

    public function getAvgVisibilityInMiles(): ?float
    {
        return $this->forecastDay->avgvis_miles;
    }

    public function getAvgHumidity(): ?int
    {
        return $this->forecastDay->avghumidity;
    }

    public function getWeatherConditionText(): ?string
    {
        return $this->forecastDay['condition:text'];
    }

    public function getWeatherConditionIconUrl(): ?string
    {
        return $this->forecastDay['condition:icon'];
    }

    public function getWeatherConditionCode(): ?int
    {
        return $this->forecastDay['condition:code'];
    }

    public function getUVIndex(): ?float
    {
        return $this->forecastDay->uv;
    }

    public function getAirQuality(): ?AirQuality
    {
        return new AirQuality($this->forecastDay);
    }
}