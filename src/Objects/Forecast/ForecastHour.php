<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Forecast;

use GrigoryGerasimov\Weather\Objects\AirQuality;
use GrigoryGerasimov\Weather\Contracts\{
    WeatherCommonInterface,
    WeatherConditionInterface,
    WeatherObjectInterface
};

final readonly class ForecastHour implements WeatherObjectInterface, WeatherCommonInterface, WeatherConditionInterface
{
    private \stdClass $forecastHour;

    public function __construct(\stdClass $forecast)
    {
        $this->forecastHour = $forecast;
    }

    public function getTimestamp(): ?int
    {
        return $this->forecastHour->time_epoch;
    }

    public function getDateTime(): ?string
    {
        return $this->forecastHour->time;
    }

    public function getActualCelsius(): ?float
    {
        return $this->forecastHour->temp_c;
    }

    public function getActualFahrenheit(): ?float
    {
        return $this->forecastHour->temp_f;
    }

    public function getWeatherConditionText(): ?string
    {
        return $this->forecastHour['condition:text'];
    }

    public function getWeatherConditionIconUrl(): ?string
    {
        return $this->forecastHour['condition:icon'];
    }

    public function getWeatherConditionCode(): ?int
    {
        return $this->forecastHour['condition:code'];
    }

    public function getWindSpeedInMiles(): ?float
    {
        return $this->forecastHour->wind_mph;
    }

    public function getWindSpeedInKm(): ?float
    {
        return $this->forecastHour->wind_kph;
    }

    public function getWindDirectionInDegrees(): ?int
    {
        return $this->forecastHour->wind_degree;
    }

    /*
     * Wind direction as 16 point compass. e.g.: NSW.
     */
    public function getWindDirectionInPoints(): ?string
    {
        return $this->forecastHour->wind_dir;
    }

    public function getPressureInMillibars(): ?float
    {
        return $this->forecastHour->pressure_mb;
    }

    public function getPressureInInches(): ?float
    {
        return $this->forecastHour->pressure_in;
    }

    public function getPrecipitationInMm(): ?float
    {
        return $this->forecastHour->precip_mm;
    }

    public function getPrecipitationInInches(): ?float
    {
        return $this->forecastHour->precip_in;
    }

    public function getHumidity(): ?int
    {
        return $this->forecastHour->humidity;
    }

    public function getCloudCover(): ?int
    {
        return $this->forecastHour->cloud;
    }

    public function getFeelsLikeCelsius(): ?float
    {
        return $this->forecastHour->feelslike_c;
    }

    public function getFeelsLikeFahrenheit(): ?float
    {
        return $this->forecastHour->feelslike_f;
    }

    public function getWindchillInCelsius(): ?float
    {
        return $this->forecastHour->windchill_c;
    }

    public function getWindchillInFahrenheit(): ?float
    {
        return $this->forecastHour->windchill_f;
    }

    public function getHeatIndexInCelsius(): ?float
    {
        return $this->forecastHour->heatindex_c;
    }

    public function getHeatIndexInFahrenheit(): ?float
    {
        return $this->forecastHour->heatindex_f;
    }

    public function getDewPointInCelsius(): ?float
    {
        return $this->forecastHour->dewpoint_c;
    }

    public function getDewPointInFahrenheit(): ?float
    {
        return $this->forecastHour->dewpoint_f;
    }

    /*
     * 1 = Yes 0 = No.
     * Will it will rain or not.
     */
    public function shallItRain(): ?int
    {
        return $this->forecastHour->will_it_rain;
    }

    /*
     * 1 = Yes 0 = No.
     * Will it will snow or not.
     */
    public function shallItSnow(): ?int
    {
        return $this->forecastHour->will_it_snow;
    }

    /*
     * 1 = Yes 0 = No.
     * Whether to show day condition icon or night icon.
     */
    public function getDayNightConditionIcon(): ?int
    {
        return $this->forecastHour->is_day;
    }

    public function getVisibilityInKm(): ?float
    {
        return $this->forecastHour->vis_km;
    }

    public function getVisibilityInMiles(): ?float
    {
        return $this->forecastHour->vis_miles;
    }

    public function getRainChance(): ?int
    {
        return $this->forecastHour->chance_of_rain;
    }

    public function getSnowChance(): ?int
    {
        return $this->forecastHour->chance_of_snow;
    }

    public function getWindGustInMiles(): ?float
    {
        return $this->forecastHour->gust_mph;
    }

    public function getWindGustInKm(): ?float
    {
        return $this->forecastHour->gust_kph;
    }

    public function getUVIndex(): ?float
    {
        return $this->forecastHour->uv;
    }

    public function getAirQuality(): ?AirQuality
    {
        return new AirQuality($this->forecastHour);
    }
}