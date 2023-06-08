<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Marine;

final readonly class MarineTides extends Marine
{
    private \stdClass $forecastMarineTides;

    public function __construct(
        protected \stdClass $forecast
    ) {
        parent::__construct($forecast);

        $this->forecastMarineTides = $forecast->tides;
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
