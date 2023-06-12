<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Forecast;

use GrigoryGerasimov\Weather\Objects\{AirQuality, Condition};
use GrigoryGerasimov\Weather\Contracts\{
    WeatherCommonInterface,
    WeatherObjectInterface
};

final readonly class ForecastHour implements WeatherObjectInterface, WeatherCommonInterface
{
    private \stdClass $forecastHour;

    public function __construct(\stdClass $forecast)
    {
        $this->forecastHour = $forecast;
    }

    public function getTimestamp(): ?int
    {
        return $this->forecastHour->time_epoch ?? null;
    }

    public function getDateTime(): ?string
    {
        return $this->forecastHour->time ?? null;
    }

    public function getActualCelsius(): ?float
    {
        return $this->forecastHour->temp_c ?? null;
    }

    public function getActualFahrenheit(): ?float
    {
        return $this->forecastHour->temp_f ?? null;
    }

    public function getWeatherCondition(): ?Condition
    {
        return isset($this->forecastHour->condition) ? new Condition($this->forecastHour->condition) : null;
    }

    public function getWindSpeedInMiles(): ?float
    {
        return $this->forecastHour->wind_mph ?? null;
    }

    public function getWindSpeedInKm(): ?float
    {
        return $this->forecastHour->wind_kph ?? null;
    }

    public function getWindDirectionInDegrees(): ?int
    {
        return $this->forecastHour->wind_degree ?? null;
    }

    /*
     * Wind direction as 16 point compass. e.g.: NSW.
     */
    public function getWindDirectionInPoints(): ?string
    {
        return $this->forecastHour->wind_dir ?? null;
    }

    public function getPressureInMillibars(): ?float
    {
        return $this->forecastHour->pressure_mb ?? null;
    }

    public function getPressureInInches(): ?float
    {
        return $this->forecastHour->pressure_in ?? null;
    }

    public function getPrecipitationInMm(): ?float
    {
        return $this->forecastHour->precip_mm ?? null;
    }

    public function getPrecipitationInInches(): ?float
    {
        return $this->forecastHour->precip_in ?? null;
    }

    public function getHumidity(): ?int
    {
        return $this->forecastHour->humidity ?? null;
    }

    public function getCloudCover(): ?int
    {
        return $this->forecastHour->cloud ?? null;
    }

    public function getFeelsLikeCelsius(): ?float
    {
        return $this->forecastHour->feelslike_c ?? null;
    }

    public function getFeelsLikeFahrenheit(): ?float
    {
        return $this->forecastHour->feelslike_f ?? null;
    }

    public function getWindchillInCelsius(): ?float
    {
        return $this->forecastHour->windchill_c ?? null;
    }

    public function getWindchillInFahrenheit(): ?float
    {
        return $this->forecastHour->windchill_f ?? null;
    }

    public function getHeatIndexInCelsius(): ?float
    {
        return $this->forecastHour->heatindex_c ?? null;
    }

    public function getHeatIndexInFahrenheit(): ?float
    {
        return $this->forecastHour->heatindex_f ?? null;
    }

    public function getDewPointInCelsius(): ?float
    {
        return $this->forecastHour->dewpoint_c ?? null;
    }

    public function getDewPointInFahrenheit(): ?float
    {
        return $this->forecastHour->dewpoint_f ?? null;
    }

    /*
     * 1 = Yes 0 = No.
     * Will it will rain or not.
     */
    public function shallItRain(): ?int
    {
        return $this->forecastHour->will_it_rain ?? null;
    }

    /*
     * 1 = Yes 0 = No.
     * Will it will snow or not.
     */
    public function shallItSnow(): ?int
    {
        return $this->forecastHour->will_it_snow ?? null;
    }

    /*
     * 1 = Yes 0 = No.
     * Whether to show day condition icon or night icon.
     */
    public function getDayNightConditionIcon(): ?int
    {
        return $this->forecastHour->is_day ?? null;
    }

    public function getVisibilityInKm(): ?float
    {
        return $this->forecastHour->vis_km ?? null;
    }

    public function getVisibilityInMiles(): ?float
    {
        return $this->forecastHour->vis_miles ?? null;
    }

    public function getRainChance(): ?int
    {
        return $this->forecastHour->chance_of_rain ?? null;
    }

    public function getSnowChance(): ?int
    {
        return $this->forecastHour->chance_of_snow ?? null;
    }

    public function getWindGustInMiles(): ?float
    {
        return $this->forecastHour->gust_mph ?? null;
    }

    public function getWindGustInKm(): ?float
    {
        return $this->forecastHour->gust_kph ?? null;
    }

    public function getUVIndex(): ?float
    {
        return $this->forecastHour->uv ?? null;
    }

    public function getAirQuality(): ?AirQuality
    {
        return isset($this->forecastHour->air_quality) ? new AirQuality($this->forecastHour) : null;
    }
}