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
        return $this->ipLookup->ip ?? null;
    }

    public function getIpType(): ?string
    {
        return $this->ipLookup->type ?? null;
    }

    public function getContinentCode(): ?string
    {
        return $this->ipLookup->continent_code ?? null;
    }

    public function getContinent(): ?string
    {
        return $this->ipLookup->continent_name ?? null;
    }

    public function getCountryCode(): ?string
    {
        return $this->ipLookup->country_code ?? null;
    }

    public function getCountry(): ?string
    {
        return $this->ipLookup->country_name ?? null;
    }

    public function isInEU(): ?bool
    {
        return $this->ipLookup->is_eu ?? null;
    }

    public function getGeonameID(): ?string
    {
        return $this->ipLookup->geoname_id ?? null;
    }

    public function getTimezoneName(): ?string
    {
        return $this->ipLookup->tz_id ?? null;
    }
}