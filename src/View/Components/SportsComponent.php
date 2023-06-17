<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use Illuminate\View\{Component, View};
use Illuminate\Support\Collection;

class SportsComponent extends Component
{
    /**
     * @param Collection $weatherSports
     */
    public function __construct(
        public Collection $weatherSports
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherSports);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('vendor.laravel-weather.components.sports');
    }
}