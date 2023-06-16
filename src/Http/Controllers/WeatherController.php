<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Http\Controllers;

use GrigoryGerasimov\Weather\Facades\Weather;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class WeatherController extends Controller
{
    public function currentIndex(string $city, string $lang = 'en'): View
    {
        $weather = Weather::api()
            ->city($city)
            ->requireAQI(true)
            ->requireAlerts(true)
            ->requireTides(true)
            ->lang($lang)
            ->get();

        $weatherCurrent = $weather->current();
        $weatherCurrentAQI = $weather->airQuality();

        return view('vendor.laravel-weather.components.current', compact('weatherCurrent', 'weatherCurrentAQI'));
    }

    public function forecastIndex(string $city, string $lang = 'en'): View
    {
        $weather = Weather::api('forecast')
            ->city($city)
            ->requireAQI(true)
            ->requireAlerts(true)
            ->requireTides(true)
            ->lang($lang)
            ->get();

        $weatherForecast = $weather->forecast();

        return view('vendor.laravel-weather.components.forecast', compact('weatherForecast'));
    }

    public function searchIndex(string $city, string $lang = 'en'): View
    {
        $weather = Weather::api('search')
            ->city($city)
            ->requireAQI(true)
            ->requireAlerts(true)
            ->requireTides(true)
            ->lang($lang)
            ->get();

        $weatherSearch = $weather->search();

        return view('vendor.laravel-weather.components.search', compact('weatherSearch'));
    }

    public function marineIndex(string $city, string $lang = 'en'): View
    {
        $weather = Weather::api('marine')
            ->city($city)
            ->requireAQI(true)
            ->requireAlerts(true)
            ->requireTides(true)
            ->lang($lang)
            ->get();

        $weatherMarine = $weather->marine();

        return view('vendor.laravel-weather.components.marine', compact('weatherMarine'));
    }

    public function timezoneIndex(string $city, string $lang = 'en'): View
    {
        $weather = Weather::api('timezone')
            ->city($city)
            ->requireAQI(true)
            ->requireAlerts(true)
            ->requireTides(true)
            ->lang($lang)
            ->get();

        $weatherTimezone = $weather->timezone();

        return view('vendor.laravel-weather.components.timezone', compact('weatherTimezone'));
    }

    public function sportsIndex(string $city, string $lang = 'en'): View
    {
        $weather = Weather::api('sports')
            ->city($city)
            ->requireAQI(true)
            ->requireAlerts(true)
            ->requireTides(true)
            ->lang($lang)
            ->get();

        $weatherSports = $weather->sports();

        return view('vendor.laravel-weather.components.sports', compact('weatherSports'));
    }

    public function astronomyIndex(string $city, string $lang = 'en'): View
    {
        $weather = Weather::api('astronomy')
            ->city($city)
            ->requireAQI(true)
            ->requireAlerts(true)
            ->requireTides(true)
            ->lang($lang)
            ->get();

        $weatherAstro = $weather->astro();

        return view('vendor.laravel-weather.components.astronomy', compact('weatherAstro'));
    }

    public function ipLookupIndex(string $city, string $lang = 'en'): View
    {
        $weather = Weather::api('ip')
            ->city($city)
            ->requireAQI(true)
            ->requireAlerts(true)
            ->requireTides(true)
            ->lang($lang)
            ->get();

        $weatherIpLookup = $weather->ipLookup();

        return view('vendor.laravel-weather.components.ip', compact('weatherIpLookup'));
    }
}