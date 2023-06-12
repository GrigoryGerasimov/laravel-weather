<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class AirQuality implements WeatherObjectInterface
{
    private array $aqi;

    public function __construct(\stdClass $data) {
        $this->aqi = (array) $data->air_quality;
    }

    public function getCarbonMonoxide(): ?float
    {
        return $this->aqi['co'] ?? null;
    }

    public function getOzone(): ?float
    {
        return $this->aqi['o3'] ?? null;
    }

    public function getNitrogenDioxide(): ?float
    {
        return $this->aqi['no2'] ?? null;
    }

    public function getSulphurDioxide(): ?float
    {
        return $this->aqi['so2'] ?? null;
    }

    public function getPM2_5(): ?float
    {
        return $this->aqi['pm2_5'] ?? null;
    }

    public function getPM10(): ?float
    {
        return $this->aqi['pm10'] ?? null;
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
        return $this->aqi['us-epa-index'] ?? null;
    }

    /*
     * UK Defra Index.
     *
     * 1-3 mean Low
     * 4-6 mean Moderate
     * 7-9 mean High
     * 10 means Very High
     *
     * For further details please refer to the official WeatherApi doc: https://www.weatherapi.com/docs/
     */
    public function getUKDefraIndex(): ?int
    {
        return $this->aqi['gb-defra-index'] ?? null;
    }
}