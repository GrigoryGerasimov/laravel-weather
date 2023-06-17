<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\Timezone;
use Illuminate\View\{Component, View};

class TimezoneComponent extends Component
{
    /**
     * @param Timezone $weatherTimezone
     */
    public function __construct(
        public Timezone $weatherTimezone
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherTimezone);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('vendor.laravel-weather.components.timezone');
    }
}