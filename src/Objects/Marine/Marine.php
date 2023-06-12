<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Marine;

use GrigoryGerasimov\Weather\Contracts\WeatherCollection\WeatherMarineInterface;
use GrigoryGerasimov\Weather\Objects\Forecast\{ForecastCommon, ForecastDay, ForecastAstro};
use Illuminate\Support\Collection;

final readonly class Marine implements WeatherMarineInterface
{
    public function __construct(
        private \stdClass $forecastMarineItem
    ) {}

    public function common(): ForecastCommon
    {
        return new ForecastCommon($this->forecastMarineItem);
    }

    public function day(): ForecastDay
    {
        return new ForecastDay($this->forecastMarineItem);
    }

    public function astro(): ForecastAstro
    {
        return new ForecastAstro($this->forecastMarineItem);
    }

    public function hour(): Collection
    {
        $collection['marine_hours'] = [];

        foreach($this->forecastMarineItem->hour as $forecastMarineHour) {
            $collection['marine_hours'][] = new MarineHour($forecastMarineHour);
        }

        return collect($collection['marine_hours']);
    }

    public function tides(): ?Collection
    {
        if (!isset($this->forecastMarineItem->day->tides)) {
            return null;
        }

        $tidesArray = $this->forecastMarineItem->day->tides;
        $collection['marine_tides'] = [];

        foreach($tidesArray as $forecastMarineTideKey => $forecastMarineTideObject) {
            if (!isset($forecastMarineTideObject->tide)) {
                return null;
            }

            $collection['marine_tides'][] = collect($forecastMarineTideObject->tide)->mapInto(MarineTide::class);;
        }

        return collect($collection['marine_tides'])->flatten();
    }
}