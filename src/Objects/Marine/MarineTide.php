<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Marine;

use GrigoryGerasimov\Weather\Contracts\WeatherMarineInterface;

final readonly class MarineTide implements WeatherMarineInterface
{
    private \stdClass $forecastMarineTides;

    public function __construct(\stdClass $forecast)
    {
        $this->forecastMarineTides = $forecast;
    }

    public function getLocalTideTime(): ?string
    {
        return $this->forecastMarineTides->tide_time;
    }

    public function getTideHeight(): ?float
    {
        return $this->forecastMarineTides->tide_height_mt;
    }

    public function getTideType(): ?string
    {
        return $this->forecastMarineTides->tide_type;
    }
}
