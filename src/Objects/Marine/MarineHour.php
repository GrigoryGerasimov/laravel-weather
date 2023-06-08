<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Marine;

use GrigoryGerasimov\Weather\Objects\Forecast\ForecastHour;

final readonly class MarineHour extends Marine
{
    private \stdClass $forecastMarineHour;

    public function __construct(
        protected \stdClass $forecast
    ) {
        parent::__construct($forecast);

        $this->forecastMarineHour = $forecast->hour;
    }

    public function getCommonForecastHourParams(): ForecastHour
    {
        return new ForecastHour($this->forecastMarineHour);
    }

    public function	getSignificantWaveHeight(): ?float
    {
        return $this->forecastMarineHour->sig_ht_mt;
    }

    public function	getSwellWaveHeightInMetres(): ?float
    {
        return $this->forecastMarineHour->swell_ht_mt;
    }

    public function	getSwellWaveHeightInFeet(): ?float
    {
        return $this->forecastMarineHour->swell_ht_ft;
    }

    public function getSwellDirection(): ?float
    {
        return $this->forecastMarineHour->swell_dir;
    }

    /*
     * Swell direction in 16 point compass.
     */
    public function getSwellDirectionInPoints(): ?float
    {
        return $this->forecastMarineHour->swell_dir_16_point;
    }

    public function getSwellPeriod(): ?float
    {
        return $this->forecastMarineHour->swell_period_secs;
    }

    public function getWaterTemperatureInCelsius(): ?float
    {
        return $this->forecastMarineHour->water_temp_c;
    }

    public function getWaterTemperatureInFahrenheit(): ?float
    {
        return $this->forecastMarineHour->water_temp_f;
    }
}