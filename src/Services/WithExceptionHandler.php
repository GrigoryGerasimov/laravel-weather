<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Services;

use GrigoryGerasimov\Weather\Exceptions\WeatherException;
use Illuminate\Support\Facades\Log;

trait WithExceptionHandler
{
    /**
     * @param WeatherException $exception
     * @return never
     * @throws WeatherException
     */
    protected function handleWeatherException(WeatherException $exception): never
    {
        Log::error("The following Weather exception has occurred on line {$exception->getLine()}:\ncode: {$exception->getCode()},\nmessage: {$exception->getMessage()}", $exception->getTrace());

        throw $exception;
    }

    /**
     * @param \Throwable $exception
     * @return never
     * @throws \Throwable
     */
    protected function handleThrowable(\Throwable $exception): never
    {
        Log::error($exception->getMessage(), $exception->getTrace());

        throw $exception;
    }
}