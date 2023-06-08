<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Models;

use GrigoryGerasimov\Weather\Contracts\{WeatherForecastInterface, WeatherMarineInterface};
use GrigoryGerasimov\Weather\Objects\{
    AirQuality,
    Alert,
    Astronomy,
    Current,
    Sports,
    Timezone
};
use GrigoryGerasimov\Weather\Objects\Forecast\{
    Forecast,
    ForecastDay,
    ForecastAstro,
    ForecastHour
};
use GrigoryGerasimov\Weather\Objects\Marine\{
    MarineHour,
    MarineTide
};
use GrigoryGerasimov\Weather\Objects\GPS\{IpLookup, Location, Search};

class Weather
{
    public function __construct(
        protected \stdClass $weatherData
    ) {}

    public function current(): Current
    {
        return new Current($this->weatherData);
    }

    /** @return array<WeatherForecastInterface> */
    public function forecast(): array
    {
        $result = [];

        foreach($this->weatherData->forecast->forecastday as $forecastItem) {
            $result['forecast_common'] = new Forecast($forecastItem);
            $result['forecast_day'] = new ForecastDay($forecastItem);
            $result['forecast_astro'] = new ForecastAstro($forecastItem);

            foreach($forecastItem->hour as $forecastHour) {
                $result['forecast_hour'][] = new ForecastHour($forecastHour);
            }
        }

        return $result;
    }

    /** @return array<WeatherMarineInterface> */
    public function marine(): array
    {
        $result = [];

        foreach($this->weatherData->forecast->forecastday as $forecastMarineItem) {
            $result['marine_common'] = new Forecast($forecastMarineItem);
            $result['marine_day'] = new ForecastDay($forecastMarineItem);

            foreach($forecastMarineItem->day->tides as $tideSet) {
                foreach($tideSet->tide as $tide) {
                    $result['marine_tides'] = new MarineTide($tide);
                }
            }

            $result['marine_astro'] = new ForecastAstro($forecastMarineItem);

            foreach($forecastMarineItem->hour as $forecastMarineHour) {
                $result['marine_hour'][] = new MarineHour($forecastMarineHour);
            }
        }

        return $result;
    }

    public function timezone(): Timezone
    {
        return new Timezone($this->weatherData);
    }

    public function ipLookup(): IpLookup
    {
        return new IpLookup($this->weatherData);
    }

    public function search(): Search
    {
        return new Search($this->weatherData);
    }

    public function location(): Location
    {
        return new Location($this->weatherData);
    }

    public function airQuality(): AirQuality
    {
        return new AirQuality($this->weatherData);
    }

    public function alerts(): Alert
    {
        return new Alert($this->weatherData);
    }

    public function astro(): Astronomy
    {
        return new Astronomy($this->weatherData);
    }

    public function sports(): Sports
    {
        return new Sports($this->weatherData);
    }
}