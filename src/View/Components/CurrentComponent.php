<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\{AirQuality, Current};
use Illuminate\View\{Component, View};
use GrigoryGerasimov\Weather\Objects\GPS\Location;

class CurrentComponent extends Component
{
    /**
     * @param Current $weatherCurrent
     * @param Location|null $weatherCurrentLocation
     * @param AirQuality|null $weatherCurrentAQI
     */
    public function __construct(
        public Current $weatherCurrent,
        public ?Location $weatherCurrentLocation = null,
        public ?AirQuality $weatherCurrentAQI = null
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherCurrent);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.current');
    }
}