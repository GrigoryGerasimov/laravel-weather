<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Providers;

use GrigoryGerasimov\Weather\Services\WeatherService;
use Illuminate\Support\ServiceProvider;

class WeatherServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(WeatherService::class, function() {
            return new WeatherService();
        });
    }

    public function boot(): void
    {}
}