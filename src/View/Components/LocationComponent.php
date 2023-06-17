<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use Illuminate\View\{Component, View};
use GrigoryGerasimov\Weather\Objects\GPS\Location;

class LocationComponent extends Component
{
    /**
     * @param Location $weatherLocation
     */
    public function __construct(
        public Location $weatherLocation
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherLocation);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('vendor.laravel-weather.components.location');
    }
}