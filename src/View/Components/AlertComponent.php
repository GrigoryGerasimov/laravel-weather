<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use Illuminate\View\{Component, View};
use Illuminate\Support\Collection;

class AlertComponent extends Component
{
    /**
     * @param Collection $weatherAlert
     */
    public function __construct(
        public Collection $weatherAlert
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherAlert);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.alert');
    }
}