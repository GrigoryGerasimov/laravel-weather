<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\GPS;

final readonly class IpLookup extends Gps
{
    /**
     * @param \stdClass $ipLookup
     */
    public function __construct(
        private \stdClass $ipLookup
    ) {
        parent::__construct($ipLookup);
    }

    /**
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->ipLookup->ip ?? null;
    }

    /**
     * @return string|null
     */
    public function getIpType(): ?string
    {
        return $this->ipLookup->type ?? null;
    }

    /**
     * @return string|null
     */
    public function getContinentCode(): ?string
    {
        return $this->ipLookup->continent_code ?? null;
    }

    /**
     * @return string|null
     */
    public function getContinent(): ?string
    {
        return $this->ipLookup->continent_name ?? null;
    }

    /**
     * @return string|null
     */
    public function getCountryCode(): ?string
    {
        return $this->ipLookup->country_code ?? null;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->ipLookup->country_name ?? null;
    }

    /**
     * @return bool|null
     */
    public function isInEU(): ?bool
    {
        return $this->ipLookup->is_eu ?? null;
    }

    /**
     * @return string|null
     */
    public function getGeonameID(): ?string
    {
        return $this->ipLookup->geoname_id ?? null;
    }

    /**
     * @return string|null
     */
    public function getTimezoneName(): ?string
    {
        return $this->ipLookup->tz_id ?? null;
    }
}