<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class MissingApiKeyFieldException extends WeatherException
{
    protected string $defaultMsg = 'Api key field missing';

    public function __construct(?string $message = null)
    {
        parent::__construct($message ?: $this->defaultMsg);
    }
}