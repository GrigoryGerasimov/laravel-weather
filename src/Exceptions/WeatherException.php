<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

abstract class WeatherException extends \Exception
{
    /**
     * @var string
     */
    protected string $defaultMsg = 'Exception has occurred';

    /**
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}