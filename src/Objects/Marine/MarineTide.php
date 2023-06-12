<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Marine;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class MarineTide implements WeatherObjectInterface
{
    private \stdClass $forecastMarineTides;

    public function __construct(\stdClass $forecast)
    {
        $this->forecastMarineTides = $forecast;
    }

    public function getLocalTideTime(): ?string
    {
        return $this->forecastMarineTides->tide_time ?? null;
    }

    public function getTideHeight(): float|string|null
    {
        return $this->forecastMarineTides->tide_height_mt ?? null;
    }

    public function getTideType(): ?string
    {
        return $this->forecastMarineTides->tide_type ?? null;
    }
}
