<?php

declare(strict_types=1);

use GrigoryGerasimov\Weather\Facades\Weather;
use GrigoryGerasimov\Weather\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::controller(WeatherController::class)->group(function() {
    Route::get(Weather::api()->city('Prague')->uri(), 'currentIndex')->name('weather.index.current');
    Route::get(Weather::api('forecast')->city('Prague')->uri(), 'forecastIndex')->name('weather.index.forecast');
    Route::get(Weather::api('search')->city('Prague')->uri(), 'searchIndex')->name('weather.index.search');
    Route::get(Weather::api('marine')->city('Prague')->uri(), 'marineIndex')->name('weather.index.marine');
    Route::get(Weather::api('future')->city('Prague')->uri(), 'futureIndex')->name('weather.index.future');
    Route::get(Weather::api('timezone')->city('Prague')->uri(), 'timezoneIndex')->name('weather.index.timezone');
    Route::get(Weather::api('sports')->city('Prague')->uri(), 'sportsIndex')->name('weather.index.sports');
    Route::get(Weather::api('astronomy')->city('Prague')->uri(), 'astronomyIndex')->name('weather.index.astronomy');
    Route::get(Weather::api('ip')->city('Prague')->uri(), 'ipLookupIndex')->name('weather.index.ip');
});