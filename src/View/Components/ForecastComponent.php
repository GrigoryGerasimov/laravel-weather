<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\Current;
use GrigoryGerasimov\Weather\Objects\Forecast\Forecast;
use GrigoryGerasimov\Weather\Objects\GPS\Location;
use Illuminate\View\{Component, View};
use Illuminate\Support\Collection;

class ForecastComponent extends Component
{
    /**
     * @param Collection<Forecast> $weatherForecast
     * @param Location|null $weatherForecastLocation
     * @param Current|null $weatherForecastCurrent
     * @param Collection|null $weatherForecastAlert
     */
    public function __construct(
        public Collection $weatherForecast,
        public ?Location $weatherForecastLocation = null,
        public ?Current $weatherForecastCurrent = null,
        public ?Collection $weatherForecastAlert = null
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherForecast);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.forecast');
    }
}