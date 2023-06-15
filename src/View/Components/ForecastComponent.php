<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use Illuminate\View\{Component, View};
use Illuminate\Support\Collection;

class ForecastComponent extends Component
{
    public function __construct(
        public Collection $weatherForecast
    ) {}

    public function render(): View
    {
        return view('components.forecast');
    }
}