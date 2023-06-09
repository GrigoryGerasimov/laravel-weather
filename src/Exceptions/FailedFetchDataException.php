<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class FailedFetchDataException extends WeatherException
{
    protected string $defaultMsg = 'Failed to fetch data';

    public function __construct(?string $message = null)
    {
        parent::__construct($message ?: $this->defaultMsg);
    }
}
