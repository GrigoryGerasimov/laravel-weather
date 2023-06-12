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

    public function common(): ?ForecastCommon
    {
        return isset($this->forecastItem->date) && isset($this->forecastItem->date_epoch) ? new ForecastCommon($this->forecastItem) : null;
    }

    public function day(): ?ForecastDay
    {
        return isset($this->forecastItem->day) ? new ForecastDay($this->forecastItem) : null;
    }

    public function astro(): ?ForecastAstro
    {
        return isset($this->forecastItem->astro) ? new ForecastAstro($this->forecastItem) : null;
    }

    public function hour(): ?Collection
    {
        $collection['forecast_hours'] = [];

        foreach($this->forecastItem->hour as $forecastHour) {
            if (!isset($forecastHour)) {
                return null;
            }

            $collection['forecast_hours'][] =  new ForecastHour($forecastHour);
        }

        return collect($collection['forecast_hours']);
    }
}