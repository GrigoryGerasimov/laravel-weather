<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Contracts;

use GrigoryGerasimov\Weather\Objects\Condition;

interface WeatherCommonInterface
{
    /**
     * @return float|null
     */
    public function getActualCelsius(): ?float;

    /**
     * @return float|null
     */
    public function getActualFahrenheit(): ?float;

    /**
     * @return float|null
     */
    public function getFeelsLikeCelsius(): ?float;

    /**
     * @return float|null
     */
    public function getFeelsLikeFahrenheit(): ?float;

    /**
     * @return Condition|null
     */
    public function getWeatherCondition(): ?Condition;

    /**
     * @return float|null
     */
    public function getWindSpeedInMiles(): ?float;

    /**
     * @return float|null
     */
    public function getWindSpeedInKm(): ?float;

    /**
     * @return int|null
     */
    public function getWindDirectionInDegrees(): ?int;

    /**
     * @return string|null
     */
    public function getWindDirectionInPoints(): ?string;

    /**
     * @return float|null
     */
    public function getPressureInMillibars(): ?float;

    /**
     * @return float|null
     */
    public function getPressureInInches(): ?float;

    /**
     * @return float|null
     */
    public function getPrecipitationInMm(): ?float;

    /**
     * @return float|null
     */
    public function getPrecipitationInInches(): ?float;

    /**
     * @return int|null
     */
    public function getHumidity(): ?int;

    /**
     * @return int|null
     */
    public function getCloudCover(): ?int;

    /**
     * @return int|null
     */
    public function getDayNightConditionIcon(): ?int;

    /**
     * @return float|null
     */
    public function getWindGustInMiles(): ?float;

    /**
     * @return float|null
     */
    public function getWindGustInKm(): ?float;

    /**
     * @return float|null
     */
    public function getUVIndex(): ?float;
}