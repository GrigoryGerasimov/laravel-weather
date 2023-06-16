<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\Forecast\Forecast;
use Illuminate\View\{Component, View};
use Illuminate\Support\Collection;

class ForecastComponent extends Component
{
    /**
     * @param Collection<Forecast> $weatherForecast
     */
    public function __construct(
        public Collection $weatherForecast
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