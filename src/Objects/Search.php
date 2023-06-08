<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class Search implements WeatherObjectInterface
{
    public function __construct(
        private \stdClass $search
    ) {}

    public function getId(): ?int
    {
        return $this->search->id;
    }

    public function getCity(): ?string
    {
        return $this->search->name;
    }

    public function getRegion(): ?string
    {
        return $this->search->region;
    }

    public function getCountry(): ?string
    {
        return $this->search->country;
    }

    public function getLatitude(): ?float
    {
        return $this->search->lat;
    }

    public function getLongitude(): ?float
    {
        return $this->search->lon;
    }

    public function getUrl(): ?string
    {
        return $this->search->url;
    }
}
