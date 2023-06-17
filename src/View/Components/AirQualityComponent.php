<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\AirQuality;
use Illuminate\View\{Component, View};

class AirQualityComponent extends Component
{
    /**
     * @param AirQuality $weatherAQI
     */
    public function __construct(
        public AirQuality $weatherAQI
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherAQI);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('vendor.laravel-weather.components.air');
    }
}