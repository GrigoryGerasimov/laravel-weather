<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Forecast;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

readonly class Forecast implements WeatherObjectInterface
{
    public function __construct(
        protected \stdClass $forecast
    ) {}

    public function getDate(): ?string
    {
        return $this->forecast->date;
    }

    public function getDateTimestamp(): ?int
    {
        return $this->forecast->date_epoch;
    }
}