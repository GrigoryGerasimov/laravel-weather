<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Forecast;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class ForecastCommon implements WeatherObjectInterface
{
    /**
     * @var string
     */
    private string $forecastDate;

    /**
     * @var int
     */
    private int $forecastTimestamp;

    /**
     * @param \stdClass $forecast
     */
    public function __construct(\stdClass $forecast)
    {
        $this->forecastDate = $forecast->date;
        $this->forecastTimestamp = $forecast->date_epoch;
    }

    /**
     * @return string|null
     */
    public function getDate(): ?string
    {
        return $this->forecastDate ?? null;
    }

    /**
     * @return int|null
     */
    public function getDateTimestamp(): ?int
    {
        return $this->forecastTimestamp ?? null;
    }
}