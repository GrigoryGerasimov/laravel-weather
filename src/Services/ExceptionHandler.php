<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Services;

use GrigoryGerasimov\Weather\Exceptions\WeatherException;
use Illuminate\Support\Facades\Log;

trait ExceptionHandler
{
    protected function handleWeatherException(WeatherException $exception): never
    {
        Log::error($exception->getMessage(), $exception->getTrace());

        die("The following Weather exception has occurred on line {$exception->getLine()} : {$exception->getMessage()}");
    }

    protected function handleThrowable(\Throwable $exception): never
    {
        Log::error($exception->getTraceAsString());

        die($exception->getMessage());
    }
}