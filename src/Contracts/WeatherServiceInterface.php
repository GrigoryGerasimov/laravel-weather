<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Contracts;

use GrigoryGerasimov\Weather\Models\Weather;

interface WeatherServiceInterface
{
    /**
     * @param string $type
     * @return self
     */
    public function apiType(string $type): self;

    /**
     * @param string $key
     * @return self
     */
    public function apiKey(string $key): self;

    /**
     * @param float $lat
     * @param float $lon
     * @return self
     */
    public function coords(float $lat, float $lon): self;

    /**
     * @param string $city
     * @return self
     */
    public function city(string $city): self;

    /**
     * @param string $zipCode
     * @return self
     */
    public function zip(string $zipCode): self;

    /**
     * @param string $metarCode
     * @return self
     */
    public function metar(string $metarCode): self;

    /**
     * @param string $iataCode
     * @return self
     */
    public function iata(string $iataCode): self;

    /**
     * @return self
     */
    public function autoIp(): self;

    /**
     * @param string $ip
     * @return self
     */
    public function ip(string $ip): self;

    /**
     * @param int $days
     * @return self
     */
    public function forecastDays(int $days): self;

    /**
     * @param string $date
     * @return self
     */
    public function forecastHistoryDate(string $date): self;

    /**
     * @param string $date
     * @return self
     */
    public function historyDate(string $date): self;

    /**
     * @param string|int $timestamp
     * @return self
     */
    public function forecastHistoryTimestamp(string|int $timestamp): self;

    /**
     * @param string|int $timestamp
     * @return self
     */
    public function historyTimestamp(string|int $timestamp): self;

    /**
     * @param int $hour
     * @return self
     */
    public function forecastHistoryHour(int $hour): self;

    /**
     * @param bool $shouldAlert
     * @return self
     */
    public function requireAlerts(bool $shouldAlert): self;

    /**
     * @param bool $ifAqi
     * @return self
     */
    public function requireAQI(bool $ifAqi): self;

    /**
     * @param bool $ifTides
     * @return self
     */
    public function requireTides(bool $ifTides): self;

    /**
     * @return self
     */
    public function withInterval(): self;

    /**
     * @param string $langCode
     * @return self
     */
    public function lang(string $langCode): self;

    /**
     * @return Weather|null
     */
    public function get(): ?Weather;
}