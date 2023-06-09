<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Forecast;

use GrigoryGerasimov\Weather\Contracts\WeatherCollection\WeatherForecastInterface;
use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;
use Illuminate\Support\Collection;

final readonly class Forecast implements WeatherObjectInterface, WeatherForecastInterface
{
    public function __construct(
        private \stdClass $forecastItem
    ) {}

    public function common(): ForecastCommon
    {
        return new ForecastCommon($this->forecastItem);
    }

    public function day(): ForecastDay
    {
        return new ForecastDay($this->forecastItem);
    }

    public function astro(): ForecastAstro
    {
        return new ForecastAstro($this->forecastItem);
    }

    public function hour(): Collection
    {
        $collection['forecast_hours'] = [];

        foreach($this->forecastItem->hour as $forecastHour) {
            $collection['forecast_hours'][] = new ForecastHour($forecastHour);
        }

        return collect($collection['forecast_hours']);
    }
}