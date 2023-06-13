<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Providers;

use GrigoryGerasimov\Weather\Services\WeatherService;
use GrigoryGerasimov\Weather\Contracts\WeatherServiceInterface;
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
    }

    /**
     * @return void
     */
    public function boot(): void
    {}
}