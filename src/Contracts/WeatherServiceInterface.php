<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Contracts;

use GrigoryGerasimov\Weather\Models\Weather;

interface WeatherServiceInterface
{
    public function apiType(string $type): self;

    public function apiKey(string $key): self;

    public function coords(string $lat, string $lon): self;

    public function city(string $city): self;

    public function zip(string $zipCode): self;

    public function metar(string $metarCode): self;

    public function iata(string $iataCode): self;

    public function autoIp(string $ip): self;

    public function ip(string $ip): self;

    public function forecastDays(int $days): self;

    public function forecastHistoryDate(string $date): self;

    public function historyDate(string $date): self;

    public function forecastHistoryTimestamp(string|int $timestamp): self;

    public function historyTimestamp(string|int $timestamp): self;

    public function forecastHistoryHour(int $hour): self;

    public function requireAlerts(bool $shouldAlert): self;

    public function requireAQI(bool $ifAqi): self;

    public function requireTides(bool $ifTides): self;

    public function withInterval(): self;

    public function lang(string $langCode): self;

    public function get(): ?Weather;
}