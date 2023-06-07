<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Astronomy implements WeatherObjectInterface
{
    public function __construct(
        private \stdClass $astronomy
    ) {}
}
