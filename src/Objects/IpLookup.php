<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

final readonly class IpLookup implements WeatherObjectInterface
{
    public function __construct(
        private \stdClass $ipLookup
    ) {}

    public function getIp(): ?string
    {
        return $this->ipLookup->ip;
    }

    public function getIpType(): ?string
    {
        return $this->ipLookup->type;
    }

    public function getContinentCode(): ?string
    {
        return $this->ipLookup->continent_code;
    }

    public function getContinentName(): ?string
    {
        return $this->ipLookup->continent_name;
    }

    public function getCountryCode(): ?string
    {
        return $this->ipLookup->country_code;
    }

    public function getCountryName(): ?string
    {
        return $this->ipLookup->country_name;
    }

    public function ifInEU(): ?bool
    {
        return $this->ipLookup->is_eu;
    }

    public function getGeonameID(): ?string
    {
        return $this->ipLookup->geoname_id;
    }

    public function getCity(): ?string
    {
        return $this->ipLookup->name;
    }

    public function getRegion(): ?string
    {
        return $this->ipLookup->region;
    }

    public function getLatitude(): ?float
    {
        return $this->ipLookup->lat;
    }

    public function getLongitude(): ?float
    {
        return $this->ipLookup->lon;
    }

    public function getTimezoneName(): ?string
    {
        return $this->ipLookup->tz_id;
    }
}