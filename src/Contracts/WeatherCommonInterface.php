<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Contracts;

interface WeatherCommonInterface
{
    public function getActualCelsius();

    public function getActualFahrenheit();

    public function getFeelsLikeCelsius();

    public function getFeelsLikeFahrenheit();

    public function getWeatherCondition();

    public function getWindSpeedInMiles();

    public function getWindSpeedInKm();

    public function getWindDirectionInDegrees();

    public function getWindDirectionInPoints();

    public function getPressureInMillibars();

    public function getPressureInInches();

    public function getPrecipitationInMm();

    public function getPrecipitationInInches();

    public function getHumidity();

    public function getCloudCover();

    public function getDayNightConditionIcon();

    public function getWindGustInMiles();

    public function getWindGustInKm();

    public function getUVIndex();
}