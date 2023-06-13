<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\GPS;

use GrigoryGerasimov\Weather\Objects\Timezone;

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
     * @return bool|string|null
     */
    public function isInEU(): bool|string|null
    {
        return $this->ipLookup->is_eu ?? null;
    }

    /**
     * @return string|int|null
     */
    public function getGeonameID(): string|int|null
    {
        return $this->ipLookup->geoname_id ?? null;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->ipLookup->city ?? null;
    }

    /**
     * @return Timezone|null
     */
    public function getCommonTimezoneParams(): ?Timezone
    {
        return isset($this->ipLookup) ? new Timezone($this->ipLookup) : null;
    }
}