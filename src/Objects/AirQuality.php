<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

final readonly class AirQuality
{
    public function __construct(
        private \stdClass $aqi
    ) {}

    public function getCarbonMonoxide(): ?float
    {
        return $this->aqi->co;
    }

    public function getOzone(): ?float
    {
        return $this->aqi->o3;
    }

    public function getNitrogenDioxide(): ?float
    {
        return $this->aqi->no2;
    }

    public function getSulphurDioxide(): ?float
    {
        return $this->aqi->so2;
    }

    public function getPM2_5(): ?float
    {
        return $this->aqi->pm2_5;
    }

    public function getPM10(): ?float
    {
        return $this->aqi->pm10;
    }

    /*
     * US - EPA standard.
     * 1 means Good
     * 2 means Moderate
     * 3 means Unhealthy for sensitive group
     * 4 means Unhealthy
     * 5 means Very Unhealthy
     * 6 means Hazardous
     */
    public function getUSEPAStandard(): ?int
    {
        return $this->aqi->usEpaIndex;
    }

    /*
     * UK Defra Index.
     * 1-3 mean Low
     * 4-6 mean Moderate
     * 7-9 mean High
     * 10 means Very High
     *
     * For further details please refer to the official WeatherApi doc: https://www.weatherapi.com/docs/
     */
    public function getUKDefraIndex(): ?int
    {
        return $this->aqi->gbDefraIndex;
    }
}