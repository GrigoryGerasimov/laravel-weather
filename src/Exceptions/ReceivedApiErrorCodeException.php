<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class ReceivedApiErrorCodeException extends WeatherException
{
    protected string $defaultMsg = 'API error received';
    protected int $errorCode;

    public function __construct(\stdClass $error)
    {
        parent::__construct($error->message ?: $this->defaultMsg);

        $this->errorCode = $error->code;
    }
}