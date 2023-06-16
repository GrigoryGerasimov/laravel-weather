<?php

declare(strict_types=1);

use GrigoryGerasimov\Weather\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::controller(WeatherController::class)->group(function() {
    Route::get('/weather/current/{city}/{lang?}', 'currentIndex')->name('weather.index.current');
    Route::get('/weather/forecast/{city}/{lang?}', 'forecastIndex')->name('weather.index.forecast');
    Route::get('/weather/search/{city}/{lang?}', 'searchIndex')->name('weather.index.search');
    Route::get('/weather/marine/{city}/{lang?}', 'marineIndex')->name('weather.index.marine');
    Route::get('/weather/timezone/{city}/{lang?}', 'timezoneIndex')->name('weather.index.timezone');
    Route::get('/weather/sports/{city}/{lang?}', 'sportsIndex')->name('weather.index.sports');
    Route::get('/weather/astronomy/{city}/{lang?}', 'astronomyIndex')->name('weather.index.astronomy');
    Route::get('/weather/ip/{ip}/{lang?}', 'ipLookupIndex')->name('weather.index.ip');
    Route::get('/weather/location/{city}/{lang?}', 'ipLookupIndex')->name('weather.index.ip');
    Route::get('/weather/alerts/{city}/{lang?}', 'ipLookupIndex')->name('weather.index.ip');
});