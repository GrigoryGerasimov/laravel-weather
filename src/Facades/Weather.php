<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Facades;

use GrigoryGerasimov\Weather\Contracts\WeatherServiceInterface;
use GrigoryGerasimov\Weather\Models\Weather as WeatherModel;
use Illuminate\Support\Facades\Facade;

/**
 * @method self apiType(string $type = 'current')
 * @method self apiKey(string $key = '52bc4de23bad4639861233754230306')
 * @method self coords(string $lat, string $lon)
 * @method self city(string $city)
 * @method self zip(string $zipCode)
 * @method self metar(string $metarCode)
 * @method self iata(string $iataCode)
 * @method self autoIp(string $ip)
 * @method self ip(string $ip)
 * @method self forecastDays(int $days = 1)
 * @method self forecastHistoryDate(string $date)
 * @method self historyDate(string $date)
 * @method self forecastHistoryTimestamp(string|int $timestamp)
 * @method self historyTimestamp(string|int $timestamp)
 * @method self forecastHistoryHour(int $hour)
 * @method self requireAlerts(bool $shouldAlert = false)
 * @method self requireAQI(bool $ifAqi = false)
 * @method self requireTides(bool $ifTides = false)
 * @method self withInterval()
 * @method self lang(string $langCode)
 * @method WeatherModel get()
 */
class Weather extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WeatherServiceInterface::class;
    }
}