<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class MissingApiFieldException extends WeatherException
{
    /**
     * @var string
     */
    protected string $defaultMsg = 'Api method field missing';

    /**
     * @param string|null $message
     */
    public function __construct(?string $message = null)
    {
        parent::__construct($message ?: $this->defaultMsg);
    }
}