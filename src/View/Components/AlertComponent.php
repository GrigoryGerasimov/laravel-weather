<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use GrigoryGerasimov\Weather\Objects\Alert;
use Illuminate\View\{Component, View};
use Illuminate\Support\Collection;

class AlertComponent extends Component
{
    /**
     * @param Collection<Alert> $weatherAlert
     */
    public function __construct(
        public Collection $weatherAlert
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !$this->weatherAlert->isEmpty();
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('vendor.laravel-weather.components.alert');
    }
}