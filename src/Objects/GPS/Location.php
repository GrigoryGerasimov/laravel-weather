<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\GPS;

final readonly class Location extends Gps
{
    public function __construct(
        private \stdClass $location
    ) {
        parent::__construct($location);
    }

    public function getCommonTimezoneParams(): Timezone
    {
        return new Timezone($this->location);
    }
}