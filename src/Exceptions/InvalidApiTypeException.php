<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class InvalidApiTypeException extends WeatherException
{
    /**
     * @var string
     */
    protected string $defaultMsg = 'Invalid type of api method provided';

    /**
     * @param string|null $message
     */
    public function __construct(?string $message = null)
    {
        parent::__construct($message ?: $this->defaultMsg);
    }
}