<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Facades;

use GrigoryGerasimov\Weather\Contracts\WeatherServiceInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method self apiType(string $type)
 * @method self apiKey(string $key)
 * @method self coords(string $lat, string $lon)
 * @method self city(string $city)
 * @method self zip(string $zipCode)
 * @method self metar(string $metarCode)
 * @method self iata(string $iataCode)
 * @method self autoIp(string $ip)
 * @method self ip(string $ip)
 * @method self forecastDays(int $days)
 * @method self forecastHistoryDate(string $date)
 * @method self historyDate(string $date)
 * @method self forecastHistoryTimestamp(string|int $timestamp)
 * @method self historyTimestamp(string|int $timestamp)
 * @method self forecastHistoryHour(int $hour)
 * @method self requireAlerts(bool $shouldAlert)
 * @method self requireAQI(bool $ifAqi)
 * @method self requireTides(bool $ifTides)
 * @method self withInterval()
 * @method self lang(string $langCode)
 * @method self get()
 */
class Weather extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WeatherServiceInterface::class;
    }
}