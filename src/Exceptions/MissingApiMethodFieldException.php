<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class MissingApiMethodFieldException extends WeatherException
{
    protected string $defaultMsg = 'Api method field missing';

    public function __construct(?string $message = null)
    {
        parent::__construct($message ?: $this->defaultMsg);
    }
}