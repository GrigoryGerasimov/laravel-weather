<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Forecast;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class ForecastCommon implements WeatherObjectInterface
{
    private string $forecastDate;
    private int $forecastTimestamp;

    public function __construct(\stdClass $forecast)
    {
        $this->forecastDate = $forecast->date;
        $this->forecastTimestamp = $forecast->date_epoch;
    }

    public function getDate(): ?string
    {
        return $this->forecastDate ?? null;
    }

    public function getDateTimestamp(): ?int
    {
        return $this->forecastTimestamp ?? null;
    }
}