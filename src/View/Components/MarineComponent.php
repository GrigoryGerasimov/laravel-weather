<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\Marine\Marine;
use Illuminate\View\{Component, View};
use Illuminate\Support\Collection;

class MarineComponent extends Component
{
    /**
     * @param Collection<Marine> $weatherMarine
     */
    public function __construct(
        public Collection $weatherMarine
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !$this->weatherMarine->isEmpty();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('vendor.laravel-weather.components.marine');
    }
}