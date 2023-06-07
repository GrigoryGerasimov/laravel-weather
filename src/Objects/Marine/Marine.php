<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\Objects\Marine;

use GrigoryGerasimov\Weather\Contracts\WeatherObjectInterface;
use GrigoryGerasimov\Weather\Objects\Forecast\Forecast;

readonly class Marine extends Forecast implements WeatherObjectInterface
{}