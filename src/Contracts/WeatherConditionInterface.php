<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Contracts;

interface WeatherConditionInterface
{
    public function getWeatherConditionText();

    public function getWeatherConditionIconUrl();

    public function getWeatherConditionCode();
}