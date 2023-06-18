<?php

declare(strict_types=1);

use GrigoryGerasimov\Weather\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::controller(WeatherController::class)->group(function() {
    Route::get('/weather/current/{city}/{lang?}', 'currentIndex')->name('weather.index.current');
    Route::get('/weather/forecast/{city}/{lang?}', 'forecastIndex')->name('weather.index.forecast');
    Route::get('/weather/search/{city}', 'searchIndex')->name('weather.index.search');
    Route::get('/weather/marine/{city}/{lang?}', 'marineIndex')->name('weather.index.marine');
    Route::get('/weather/timezone/{city}', 'timezoneIndex')->name('weather.index.timezone');
    Route::get('/weather/sports', 'sportsIndex')->name('weather.index.sports');
    Route::get('/weather/astronomy/{city}', 'astronomyIndex')->name('weather.index.astronomy');
    Route::get('/weather/ip/{ip}', 'ipLookupIndex')->name('weather.index.ip');
});
