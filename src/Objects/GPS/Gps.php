<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\GPS;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;

abstract readonly class Gps implements WeatherObjectInterface
{
    /**
     * @var \stdClass
     */
    private \stdClass $data;

    /**
     * @param \stdClass $weatherData
     */
    public function __construct(\stdClass $weatherData) {
        $this->data = $weatherData;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->data->name ?? null;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->data->region ?? null;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->data->country ?? null;
    }

    /**
     * @return float|null
     */
    public function getLatitude(): ?float
    {
        return $this->data->lat ?? null;
    }

    /**
     * @return float|null
     */
    public function getLongitude(): ?float
    {
        return $this->data->lon ?? null;
    }
}