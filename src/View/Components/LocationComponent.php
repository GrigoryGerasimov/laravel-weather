<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\GPS\Location;
use Illuminate\View\{Component, View};

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