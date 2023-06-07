<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class InvalidApiTypeException extends WeatherException
{
    protected string $defaultMsg = 'Invalid type of api method provided';

    public function __construct(?string $message = null)
    {
        parent::__construct($message ?: $this->defaultMsg);
    }
}