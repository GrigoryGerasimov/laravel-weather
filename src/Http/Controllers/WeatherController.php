<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Http\Controllers;

use GrigoryGerasimov\Weather\Exceptions\ReceivedApiErrorCodeException;
use GrigoryGerasimov\Weather\Facades\Weather;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class WeatherController extends Controller
{
    /**
     * @param string $city
     * @param string $lang
     * @return View
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
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
        $weatherCurrentLocation = $weather->location();
        $weatherCurrentAQI = $weather->airQuality();

        return view('vendor.laravel-weather.pages.current', compact('weatherCurrent', 'weatherCurrentAQI', 'weatherCurrentLocation'));
    }

    /**
     * @param string $city
     * @param string $lang
     * @return View
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function forecastIndex(string $city, string $lang = 'en'): View
    {
        $weather = Weather::api('forecast')
            ->city($city)
            ->requireAQI(true)
            ->requireAlerts(true)
            ->requireTides(true)
            ->forecastDays(5)
            ->lang($lang)
            ->get();

        $weatherForecast = $weather->forecast();
        $weatherForecastLocation = $weather->location();
        $weatherForecastCurrent = $weather->current();
        $weatherForecastCurrentAQI = $weather->airQuality();
        $weatherForecastAlert = $weather->alerts();

        return view('vendor.laravel-weather.pages.forecast', compact('weatherForecast', 'weatherForecastLocation', 'weatherForecastCurrent', 'weatherForecastCurrentAQI', 'weatherForecastAlert'));
    }

    /**
     * @param string $city
     * @param string $lang
     * @return View
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
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

        return view('vendor.laravel-weather.pages.search', compact('weatherSearch'));
    }

    /**
     * @param string $city
     * @param string $lang
     * @return View
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
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
        $weatherMarineLocation = $weather->location();

        return view('vendor.laravel-weather.pages.marine', compact('weatherMarine', 'weatherMarineLocation'));
    }

    /**
     * @param string $city
     * @param string $lang
     * @return View
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
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
        $weatherTimezoneLocation = $weather->location();

        return view('vendor.laravel-weather.pages.timezone', compact('weatherTimezone', 'weatherTimezoneLocation'));
    }

    /**
     * @param string $city
     * @param string $lang
     * @return View
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
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

        return view('vendor.laravel-weather.pages.sports', compact('weatherSports'));
    }

    /**
     * @param string $city
     * @param string $lang
     * @return View
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
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
        $weatherAstroLocation = $weather->location();

        return view('vendor.laravel-weather.pages.astronomy', compact('weatherAstro', 'weatherAstroLocation'));
    }

    /**
     * @param string $ip
     * @param string $lang
     * @return View
     * @throws ReceivedApiErrorCodeException
     * @throws \Throwable
     */
    public function ipLookupIndex(string $ip, string $lang = 'en'): View
    {
        $weather = Weather::api('ip')
            ->ip($ip)
            ->requireAQI(true)
            ->requireAlerts(true)
            ->requireTides(true)
            ->lang($lang)
            ->get();

        $weatherIpLookup = $weather->ipLookup();

        return view('vendor.laravel-weather.pages.ip', compact('weatherIpLookup'));
    }
}