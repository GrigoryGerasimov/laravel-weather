<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class InvalidArgumentValueException extends WeatherException
{
    protected string $defaultMsg = 'Invalid argument value provided';

    public function __construct(?string $message = null)
    {
        parent::__construct($message ?: $this->defaultMsg);
    }
}