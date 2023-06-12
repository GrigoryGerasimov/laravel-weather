<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\GPS;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

abstract readonly class Gps implements WeatherObjectInterface
{
    private \stdClass $data;

    public function __construct(\stdClass $weatherData) {
        $this->data = $weatherData;
    }

    public function getCity(): ?string
    {
        return $this->data->name ?? null;
    }

    public function getRegion(): ?string
    {
        return $this->data->region ?? null;
    }

    public function getCountry(): ?string
    {
        return $this->data->country ?? null;
    }

    public function getLatitude(): ?float
    {
        return $this->data->lat ?? null;
    }

    public function getLongitude(): ?float
    {
        return $this->data->lon ?? null;
    }
}