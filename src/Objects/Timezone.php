<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Timezone implements WeatherObjectInterface
{
    public function __construct(
        private \stdClass $timezone
    ) {}

    public function getTimezoneName(): ?string
    {
        return $this->timezone->tz_id ?? null;
    }

    public function getTimestamp(): ?int
    {
        return $this->timezone->localtime_epoch ?? null;
    }

    public function getDateTime(): ?string
    {
        return $this->timezone->localtime ?? null;
    }
}