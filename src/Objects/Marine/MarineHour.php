<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Marine;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;
use GrigoryGerasimov\Weather\Objects\Forecast\ForecastHour;

final readonly class MarineHour implements WeatherObjectInterface
{
    private \stdClass $forecastMarineHour;

    public function __construct(\stdClass $forecast)
    {
        $this->forecastMarineHour = $forecast;
    }

    public function getCommonForecastHourParams(): ?ForecastHour
    {
        return isset($this->forecastMarineHour) ? new ForecastHour($this->forecastMarineHour) : null;
    }

    public function	getSignificantWaveHeight(): ?float
    {
        return $this->forecastMarineHour->sig_ht_mt ?? null;
    }

    public function	getSwellWaveHeightInMetres(): ?float
    {
        return $this->forecastMarineHour->swell_ht_mt ?? null;
    }

    public function	getSwellWaveHeightInFeet(): ?float
    {
        return $this->forecastMarineHour->swell_ht_ft ?? null;
    }

    public function getSwellDirection(): ?float
    {
        return $this->forecastMarineHour->swell_dir ?? null;
    }

    /*
     * Swell direction in 16 point compass.
     */
    public function getSwellDirectionInPoints(): ?float
    {
        return $this->forecastMarineHour->swell_dir_16_point ?? null;
    }

    public function getSwellPeriod(): ?float
    {
        return $this->forecastMarineHour->swell_period_secs ?? null;
    }

    public function getWaterTemperatureInCelsius(): ?float
    {
        return $this->forecastMarineHour->water_temp_c ?? null;
    }

    public function getWaterTemperatureInFahrenheit(): ?float
    {
        return $this->forecastMarineHour->water_temp_f ?? null;
    }
}