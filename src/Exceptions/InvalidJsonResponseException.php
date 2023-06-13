<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class InvalidJsonResponseException extends WeatherException
{
    /**
     * @var string
     */
    protected string $defaultMsg = 'Invalid json response. Please kindly check the request syntax';

    /**
     * @param string|null $message
     */
    public function __construct(?string $message = null)
    {
        parent::__construct($message ?: $this->defaultMsg);
    }
}