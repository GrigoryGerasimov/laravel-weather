<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\GPS;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Timezone implements WeatherObjectInterface
{
    public function __construct(
        private \stdClass $timezone
    ) {}

    public function getTimezoneName(): ?string
    {
        return $this->timezone->tz_id;
    }

    public function getTimestamp(): ?int
    {
        return $this->timezone->localtime_epoch;
    }

    public function getDateTime(): ?string
    {
        return $this->timezone->localtime;
    }
}