<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Providers;

use GrigoryGerasimov\Weather\Services\WeatherService;
use GrigoryGerasimov\Weather\Contracts\WeatherServiceInterface;
use GrigoryGerasimov\Weather\View\Components\{
    AirQualityComponent,
    AlertComponent,
    AstronomyComponent,
    ConditionComponent,
    CurrentComponent,
    ForecastComponent,
    IpLookupComponent,
    LocationComponent,
    MarineComponent,
    SearchComponent,
    SportsComponent,
    TimezoneComponent
};
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
        ], 'laravel-weather');
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../views/weather', 'laravel-weather');
        $this->publishes([
            __DIR__ . '/../../views/weather' => resource_path('views/vendor/laravel-weather'),
            __DIR__ . '/../../docs' => public_path('vendor/laravel-weather/docs')
        ], 'laravel-weather');

        Blade::components([
            'weather-astronomy' => AstronomyComponent::class,
            'weather-current' => CurrentComponent::class,
            'weather-forecast' => ForecastComponent::class,
            'weather-ip' => IpLookupComponent::class,
            'weather-marine' => MarineComponent::class,
            'weather-search' => SearchComponent::class,
            'weather-sports' => SportsComponent::class,
            'weather-timezone' => TimezoneComponent::class,
            'weather-location' => LocationComponent::class,
            'weather-alert' => AlertComponent::class,
            'weather-air' => AirQualityComponent::class,
            'weather-condition' => ConditionComponent::class
        ]);
    }
}