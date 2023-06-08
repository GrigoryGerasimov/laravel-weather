<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\GPS;

final readonly class IpLookup extends Gps
{
    public function __construct(
        private \stdClass $ipLookup
    ) {
        parent::__construct($ipLookup);
    }

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

    public function getContinent(): ?string
    {
        return $this->ipLookup->continent_name;
    }

    public function getCountryCode(): ?string
    {
        return $this->ipLookup->country_code;
    }

    public function getCountry(): ?string
    {
        return $this->ipLookup->country_name;
    }

    public function isInEU(): ?bool
    {
        return $this->ipLookup->is_eu;
    }

    public function getGeonameID(): ?string
    {
        return $this->ipLookup->geoname_id;
    }

    public function getTimezoneName(): ?string
    {
        return $this->ipLookup->tz_id;
    }
}