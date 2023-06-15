<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Http\Controllers;

use GrigoryGerasimov\Weather\Facades\Weather;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class WeatherController extends Controller
{
    public function currentIndex(): View
    {
        $weather = Weather::api()->city('Prague')->get();
        $weatherCurrent = $weather->current();

        return view('vendor.laravel-weather.components.current', compact('weatherCurrent'));
    }

    public function forecastIndex(): View
    {
        $weather = Weather::api('forecast')->city('Prague')->get();
        $weatherForecast = $weather->forecast();

        return view('vendor.laravel-weather.components.forecast', compact('weatherForecast'));
    }

    public function searchIndex(): View
    {
        $weather = Weather::api('search')->city('Prague')->get();
        $weatherSearch = $weather->search();

        return view('vendor.laravel-weather.components.search', compact('weatherSearch'));
    }

    public function marineIndex(): View
    {
        $weather = Weather::api('marine')->city('Prague')->get();
        $weatherMarine = $weather->marine();

        return view('vendor.laravel-weather.components.marine', compact('weatherMarine'));
    }

    public function timezoneIndex(): View
    {
        $weather = Weather::api('timezone')->city('Prague')->get();
        $weatherTimezone = $weather->timezone();

        return view('vendor.laravel-weather.components.timezone', compact('weatherTimezone'));
    }

    public function sportsIndex(): View
    {
        $weather = Weather::api('sports')->city('Prague')->get();
        $weatherSports = $weather->sports();

        return view('vendor.laravel-weather.components.sports', compact('weatherSports'));
    }

    public function astronomyIndex(): View
    {
        $weather = Weather::api('astronomy')->city('Prague')->get();
        $weatherAstro = $weather->astro();

        return view('vendor.laravel-weather.components.astronomy', compact('weatherAstro'));
    }

    public function ipLookupIndex(): View
    {
        $weather = Weather::api('ip')->city('Prague')->get();
        $weatherIpLookup = $weather->ipLookup();

        return view('vendor.laravel-weather.components.ip', compact('weatherIpLookup'));
    }
}