<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Current implements WeatherObjectInterface
{
    public function __construct(
        private \stdClass $current
    ) {}

    public function getLastUpdated(): string
    {
        return $this->current->last_updated;
    }

    public function getLastUpdatedTimestamp(): int
    {
        return $this->current->last_updated_epoch;
    }

    public function getActualCelsius(): float
    {
        return $this->current->temp_c;
    }

    public function getActualFahrenheit(): float
    {
        return $this->current->temp_f;
    }

    public function getFeelsLikeCelsius(): float
    {
        return $this->current->feelslike_c;
    }

    public function getFeelsLikeFahrenheit(): float
    {
        return $this->current->feelslike_f;
    }

    public function getWeatherConditionText(): string
    {
        return $this->current['condition:text'];
    }

    public function getWeatherConditionIconUrl(): string
    {
        return $this->current['condition:icon'];
    }

    public function getWeatherConditionCode(): int
    {
        return $this->current['condition:code'];
    }

    public function getWindSpeedInMiles(): float
    {
        return $this->current->wind_mph;
    }

    public function getWindSpeedInKm(): float
    {
        return $this->current->wind_kph;
    }

    public function getWindDirectionInDegrees(): int
    {
        return $this->current->wind_degree;
    }

    /*
     * Wind direction as 16 point compass. e.g.: NSW.
     */
    public function getWindDirectionInPoints(): string
    {
        return $this->current->wind_dir;
    }

    public function getPressureInMillibars(): float
    {
        return $this->current->pressure_mb;
    }

    public function getPressureInInches(): float
    {
        return $this->current->pressure_in;
    }

    public function getPrecipitationInMm(): float
    {
        return $this->current->precip_mm;
    }

    public function getPrecipitationInInches(): float
    {
        return $this->current->precip_in;
    }

    public function getHumidity(): int
    {
        return $this->current->humidity;
    }

    public function getCloudCover(): int
    {
        return $this->current->cloud;
    }

    /*
     * 1 = Yes 0 = No.
     * Whether to show day condition icon or night icon.
     */
    public function getDayNightConditionIcon(): int
    {
        return $this->current->is_day;
    }

    public function getUVIndex(): float
    {
        return $this->current->uv;
    }

    public function getWindGustInMiles(): float
    {
        return $this->current->gust_mph;
    }

    public function getWindGustInKm(): float
    {
        return $this->current->gust_kph;
    }
}