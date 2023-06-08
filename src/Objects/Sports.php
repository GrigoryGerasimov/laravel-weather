<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Sports implements WeatherObjectInterface
{
    public function __construct(
        private \stdClass $sports
    ) {}

    public function getStadium(): ?string
    {
        return $this->sports->stadium;
    }

    public function getCountry(): ?int
    {
        return $this->sports->country;
    }

    public function getRegion(): ?string
    {
        return $this->sports->region;
    }

    public function getTournament(): ?string
    {
        return $this->sports->tournament;
    }

    public function getStartDateTime(): ?string
    {
        return $this->sports->start;
    }

    public function getMatch(): ?string
    {
        return $this->sports->match;
    }
}
