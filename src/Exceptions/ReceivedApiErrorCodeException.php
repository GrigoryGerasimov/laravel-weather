<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

class ReceivedApiErrorCodeException extends WeatherException
{
    /**
     * @var string
     */
    protected string $defaultMsg = 'API error received';

    /**
     * @var int
     */
    protected int $errorCode;

    /**
     * @param \stdClass $error
     */
    public function __construct(\stdClass $error)
    {
        parent::__construct($error->message ?: $this->defaultMsg);

        $this->errorCode = $error->code;
    }
}