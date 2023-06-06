<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects;

final readonly class Location
{
    private \stdClass $data;

    public function __construct(\stdClass $weatherData) {
        $this->data = $weatherData->location;
    }

    public function getCity(): ?string
    {
        return $this->data->name;
    }

    public function getRegion(): ?string
    {
        return $this->data->region;
    }

    public function getCountry(): ?string
    {
        return $this->data->country;
    }

    public function getLatitude(): ?float
    {
        return $this->data->lat;
    }

    public function getLongitude(): ?float
    {
        return $this->data->lon;
    }

    public function getTimezoneName(): ?string
    {
        return $this->data->tz_id;
    }

    public function getTimestamp(): ?int
    {
        return $this->data->localtime_epoch;
    }

    public function getDateTime(): ?string
    {
        return $this->data->localtime;
    }
}