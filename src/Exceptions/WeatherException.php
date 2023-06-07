<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Exceptions;

abstract class WeatherException extends \Exception
{
    protected string $defaultMsg = 'Exception has occurred';

    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}