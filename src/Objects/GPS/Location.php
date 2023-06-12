<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\GPS;

use GrigoryGerasimov\Weather\Objects\Timezone;

final readonly class Location extends Gps
{
    public function __construct(
        private \stdClass $location
    ) {
        parent::__construct($location->location);
    }

    public function getCommonTimezoneParams(): ?Timezone
    {
        return isset($this->location->location) ? new Timezone($this->location->location) : null;
    }
}