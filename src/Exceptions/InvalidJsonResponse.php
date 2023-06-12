<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class InvalidJsonResponse extends WeatherException
{
    protected string $defaultMsg = 'Invalid json response. Please kindly check the request syntax';

    public function __construct(?string $message = null)
    {
        parent::__construct($message ?: $this->defaultMsg);
    }
}