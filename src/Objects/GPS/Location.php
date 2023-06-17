<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\GPS;

use GrigoryGerasimov\Weather\Objects\Timezone;

final readonly class Location extends Gps
{
    /**
     * @param \stdClass $location
     */
    public function __construct(
        private \stdClass $location
    ) {
        parent::__construct($location);
    }

    /**
     * @return Timezone|null
     */
    public function getCommonTimezoneParams(): ?Timezone
    {
        return isset($this->location) ? new Timezone($this->location) : null;
    }
}