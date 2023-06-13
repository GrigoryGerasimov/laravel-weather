<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class MissingApiKeyFieldException extends WeatherException
{
    /**
     * @var string
     */
    protected string $defaultMsg = 'Api key field missing';

    /**
     * @param string|null $message
     */
    public function __construct(?string $message = null)
    {
        parent::__construct($message ?: $this->defaultMsg);
    }
}