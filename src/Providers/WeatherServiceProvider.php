<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Providers;

use GrigoryGerasimov\Weather\Services\WeatherService;
use GrigoryGerasimov\Weather\Contracts\WeatherServiceInterface;
use GrigoryGerasimov\Weather\View\Components\AstronomyComponent;
use GrigoryGerasimov\Weather\View\Components\CurrentComponent;
use GrigoryGerasimov\Weather\View\Components\ForecastComponent;
use GrigoryGerasimov\Weather\View\Components\IpLookupComponent;
use GrigoryGerasimov\Weather\View\Components\MarineComponent;
use GrigoryGerasimov\Weather\View\Components\SearchComponent;
use GrigoryGerasimov\Weather\View\Components\SportsComponent;
use GrigoryGerasimov\Weather\View\Components\TimezoneComponent;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(WeatherServiceInterface::class, function() {
            return new WeatherService();
        });

        $this->publishes([
           __DIR__ . '/../../config/weather.php' => config_path('weather.php')
        ]);
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../../views/weather', 'laravel-weather');
        $this->publishes([
            __DIR__ . '/../../views/weather' => resource_path('views/vendor/laravel-weather')
        ]);

        Blade::component('weather-astronomy', AstronomyComponent::class);
        Blade::component('weather-current', CurrentComponent::class);
        Blade::component('weather-forecast', ForecastComponent::class);
        Blade::component('weather-ip', IpLookupComponent::class);
        Blade::component('weather-marine', MarineComponent::class);
        Blade::component('weather-search', SearchComponent::class);
        Blade::component('weather-sports', SportsComponent::class);
        Blade::component('weather-timezone', TimezoneComponent::class);
    }
}