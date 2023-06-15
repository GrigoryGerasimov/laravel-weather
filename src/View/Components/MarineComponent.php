<?php

declare(strict_types=1);

namespace GrigoryGerasimov\Weather\View\Components;

use Illuminate\View\{Component, View};
use Illuminate\Support\Collection;

class MarineComponent extends Component
{
    /**
     * @param Collection $weatherMarine
     */
    public function __construct(
        public Collection $weatherMarine
    ) {}

    /**
     * @return bool
     */
    public function shouldRender(): bool
    {
        return !is_null($this->weatherMarine);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        return view('components.marine');
    }
}