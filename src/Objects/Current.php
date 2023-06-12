<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\{WeatherCommonInterface, WeatherObjectInterface};

final readonly class Current implements WeatherObjectInterface, WeatherCommonInterface
{
    private \stdClass $current;

    public function __construct(\stdClass $data)
    {
        $this->current = $data->current;
    }

    public function getLastUpdated(): ?string
    {
        return $this->current->last_updated ?? null;
    }

    public function getLastUpdatedTimestamp(): ?int
    {
        return $this->current->last_updated_epoch ?? null;
    }

    public function getActualCelsius(): ?float
    {
        return $this->current->temp_c ?? null;
    }

    public function getActualFahrenheit(): ?float
    {
        return $this->current->temp_f ?? null;
    }

    public function getFeelsLikeCelsius(): ?float
    {
        return $this->current->feelslike_c ?? null;
    }

    public function getFeelsLikeFahrenheit(): ?float
    {
        return $this->current->feelslike_f ?? null;
    }

    public function getWeatherCondition(): ?Condition
    {
        return isset($this->current->condition) ? new Condition($this->current->condition) : null;
    }

    public function getWindSpeedInMiles(): ?float
    {
        return $this->current->wind_mph ?? null;
    }

    public function getWindSpeedInKm(): ?float
    {
        return $this->current->wind_kph ?? null;
    }

    public function getWindDirectionInDegrees(): ?int
    {
        return $this->current->wind_degree ?? null;
    }

    /*
     * Wind direction as 16 point compass. e.g.: NSW.
     */
    public function getWindDirectionInPoints(): ?string
    {
        return $this->current->wind_dir ?? null;
    }

    public function getPressureInMillibars(): ?float
    {
        return $this->current->pressure_mb ?? null;
    }

    public function getPressureInInches(): ?float
    {
        return $this->current->pressure_in ?? null;
    }

    public function getPrecipitationInMm(): ?float
    {
        return $this->current->precip_mm ?? null;
    }

    public function getPrecipitationInInches(): ?float
    {
        return $this->current->precip_in ?? null;
    }

    public function getHumidity(): ?int
    {
        return $this->current->humidity ?? null;
    }

    public function getCloudCover(): ?int
    {
        return $this->current->cloud ?? null;
    }

    /*
     * 1 = Yes 0 = No.
     * Whether to show day condition icon or night icon.
     */
    public function getDayNightConditionIcon(): ?int
    {
        return $this->current->is_day ?? null;
    }

    public function getUVIndex(): ?float
    {
        return $this->current->uv ?? null;
    }

    public function getWindGustInMiles(): ?float
    {
        return $this->current->gust_mph ?? null;
    }

    public function getWindGustInKm(): ?float
    {
        return $this->current->gust_kph ?? null;
    }
}